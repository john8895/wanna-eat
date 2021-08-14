<?php
require_once(__DIR__ . '/LINEBotTiny.php');
require_once('../assets/include/order.inc.php');
require_once('../assets/inc/connect.php');
require_once('../assets/include/connect.inc.php');
// Config
define('HTTP_HOST', $_SERVER['HTTP_HOST']);
define('SERVER_ROOT_PATH', dirname(dirname(__FILE__)));
define('CHANNEL_ACCESS_TOKEN', 'fLjvFXAZfRDqcTMr5tSOaMAYAeA3kv03qYjcFkYQHjy8GntgfAM491knLIwvvH6g1QBH312V2IVYO0UlWJb/pgb/TkLuqNywQQiQHwiamOEl5JmUeR2kHQ4+CLifZ63q6597VUGSjIsRz7A+cUgBIQdB04t89/1O/w1cDnyilFU=');
define('CHANNEL_SECRET', '42699015866d7b2329e0f9fa2cfebce0');
// State
define('CONTEXT_STATE', 'state');
define('CONTEXT_ORDER_MODE', 'orderMode');
define('STATE_ORDER', 'order');
define('STATE_POST_MEMBER', 'postMember');
define('STATE_CHOOSE_GROUP_BUY', 'chooseGroupBuy');
define('STATE_MENU_OPTIONS', 'menuOptions');
define('STATE_POST_ORDER', 'postOrder');
define('STATE_POST_ORDER_COMMAND', 'postOrderCommand');
// Command
define('COMMEND_RESET', '#reset');
define('COMMEND_ORDER', 'order');

// Test Area
//$userId = 'Uadc6b08a44873820d6446554f0f2f790';
//$lineBot = new LineBot($userId);
//$connect = new Connect();
//
//$selectedGroupBuyNumber = (int)'1';
//$lineBot->setContext('selectedGroupBuy', $selectedGroupBuyNumber);
//$currentState = $lineBot->getContext();  // 資料庫有沒有記錄
//$selectedNum = $currentState['selectedGroupBuy'];  // 選擇的團購單號
//$groupBuys = $lineBot->getGroupBuy();
//$selectedGroupBuy = $groupBuys[$selectedNum - 1];  // 選擇的團購單
//// 建立 StdClass 物件，指定欄位名稱
//$orderInfo = new stdClass();
//$orderInfo->groupBuyId = $selectedGroupBuy['id'];
//$orderInfo->orderName = $lineBot->getNickName();
//$orderInfo->fieldId = uniqid();
//$orderInfo->orderMeal = $currentState['orderInfo'][0];
//$orderInfo->orderPrice = $currentState['orderInfo'][1];
//$orderInfo->orderNumber = $currentState['orderInfo'][2];
////$currentState['orderInfo'][3] = '不加飯';
//// 判斷備註是否存在？
//if (!empty($currentState['orderInfo'][3])) {
//    $orderInfo->orderRemark = $currentState['orderInfo'][3];;
//}
///*
//stdClass Object
//(
//    [groupBuyId] => 210811145642
//    [orderName] => 小豬
//    [orderMeal] => 雞排飯
//    [orderPrice] => 90
//    [orderNumber] => 1
//)
// */
//$orderData = json_decode(json_encode($orderInfo), true);  // StdClass to Array
////$data = $orderData;
////$remark = empty($data['orderRemark']) ? '' : ", '{$data['orderRemark']}'";
////$remarkFieldName = empty($data['orderRemark']) ? '' : ", order_remark";
////$sql = "INSERT INTO orders (order_id, order_name, field_id, order_meal, order_price, order_number$remarkFieldName) VALUES ('{$data['groupBuyId']}', '{$data['orderName']}', '{$data['fieldId']}', '{$data['orderMeal']}', {$data['orderPrice']}, {$data['orderNumber']}$remark);";
//$result = $lineBot->postOrder($orderData);
//die();

$client = new LINEBotTiny(CHANNEL_ACCESS_TOKEN, CHANNEL_SECRET);


function lineBotHandler($client, $event)
{
    $userId = $event['source']['userId'];
    $lineBot = new LineBot($userId);

    if (!$event || !$client) return;
    if ($event['message']['type'] !== 'text') {
        $sendMessage = "阿鬼，你還是說中文吧！(提示：用文字訊息)";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }
    $userMessage = strtolower($event['message']['text']);  // 使用者送出的文字
    $nickName = $lineBot->getNickName();  // 取得暱稱(有userId)
    $currentState = $lineBot->getContext();  // 資料庫有沒有記錄

    // 操作指令 START
    if ($userMessage == COMMEND_RESET) {
        $context = '';
        $lineBot->updateContext($context);
        $lineBot->replyTextMessage($client, $event, '取消所有狀態');
        return;
    }

    if ($currentState['state'] == STATE_POST_MEMBER) {
        // 輸入暱稱建立帳號
        $nickName = $userMessage;
        $lineBot->postMember($nickName);
        $lineBot->setContext('state', 'memberCreated');
        $sendMessage = "帳號幫你建立好囉，你的暱稱是{$nickName}，網站登入密碼是000000，請輸入 " . COMMEND_ORDER . " 開始訂餐";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }

    if ($userMessage == COMMEND_ORDER) {
        $lineBot->setContext('state', 'order');
        $currentState = $lineBot->getContext();  // 重新取得使用者狀態
    }

    // 訂餐提示
    if ($currentState['state'] != STATE_ORDER) {
        $sendMessage = "嗨！若要開始訂餐請輸入 " . COMMEND_ORDER;
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }

    // 帳號不存在，提示輸入暱稱
    if (!$nickName) {
        $lineBot->setContext('state', 'postMember');
        $sendMessage = "嗨！帳號不存在，請輸入你的暱稱，幫你建立帳號喔！";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }

    // 輸入大於總團購單數
    if ($currentState['orderMode'] == STATE_CHOOSE_GROUP_BUY) {
        $groupBuys = $lineBot->getGroupBuy();
        $groupBuysCount = count($groupBuys);
        if ($userMessage > $groupBuysCount) {  // 大於總團購單數
            $lineBot->replyTextMessage($client, $event, '喂~沒這選項吧，看清楚再輸入啦，重新輸入一次！');
            return;
        }

        // 輸入 0 取消訂單
        if ($userMessage === '0') {
            $sendMessage = "蛤~不訂囉？那下次再來吧！愛你喔！~";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            $lineBot->setContext('state', 'reset');
            $lineBot->setContext('orderMode', 'reset');
            return;
        }
    }

    // 選擇團購單
    if ($currentState['orderMode'] == STATE_CHOOSE_GROUP_BUY) {
        $groupBuys = $lineBot->getGroupBuy();
        $groupBuysCount = count($groupBuys);
        $selectedGroupBuyNumber = (int)$userMessage;
        if ($selectedGroupBuyNumber <= $groupBuysCount) {
            $sendMessage = "【團購單選擇成功】\n你選了 $userMessage. {$groupBuys[$selectedGroupBuyNumber]['store_name']}";
            $sendMessage .= "\n\n【接下來】\n按 0 取消\n按 1 顯示菜單(看完後按 2 點餐)\n按 2 直接點餐";
            $lineBot->setContext('orderMode', 'menuOptions');
            $lineBot->setContext('selectedGroupBuy', $selectedGroupBuyNumber);
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            return;
        }
        return;
    }

    // 點餐模式
    if ($currentState['orderMode'] == STATE_POST_ORDER) {
        // 校驗格式
        $orderContent = $userMessage;
        $orderArray = explode(' ', $orderContent);
        $orderArrayCount = count($orderArray);
        $sendMessage = "輸入錯誤，請按照格式重新輸入\n\n";
        $sendMessage .= "【點餐格式】\n餐名 價格 數量 備註\n例：雞排飯 90 1 不要飯\n備註可填可不填\n\n再填一次試試！~";

        if ($orderArrayCount <= 0) {
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            $lineBot->setContext('orderMode', 'postOrder');
            return;
        }
        if ($orderArrayCount > 4) {
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            $lineBot->setContext('orderMode', 'postOrder');
            return;
        }
        if ($orderArrayCount < 3) {
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            $lineBot->setContext('orderMode', 'postOrder');
            return;
        }

        // 確認點餐內容
        $lineBot->setContext('orderMode', 'postOrderCommand');
        $orderRemark = $orderArray[3] ? "\n備註：" . $orderArray[3] : '';
        $sendMessage = "【確認點餐內容】\n";
        $sendMessage .= "餐點：$orderArray[0]\n價格：$orderArray[1] 元\n數量：$orderArray[2] 個$orderRemark\n\n";
//        $sendMessage .= "我抄的資訊對嗎？\n正確的話回覆 1 把訂單存起來，這樣才能訂購完成\n\n";
        $sendMessage .= "【接下來】\n按 0 重新點餐\n按 1 確認訂單，完成訂購";

        // 把選擇的餐點資訊先存入狀態
        $orderInfo = array($orderArray[0], $orderArray[1], $orderArray[2]);
        if ($orderRemark != '') {
            array_push($orderInfo, $orderRemark);
        }
        $lineBot->setContext('orderInfo', $orderInfo);
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }


    // 點餐指令
    if ($currentState['orderMode'] == STATE_POST_ORDER_COMMAND) {
        // 重新點餐
        if ($userMessage == '0') {
            $lineBot->setContext('orderMode', 'poserOrder');
            $sendMessage = "請按照格式重新輸入\n\n";
            $sendMessage .= "【點餐格式】\n餐名 價格 數量 備註\n例：雞排飯 90 1 不要飯\n備註可填可不填\n\n你再填一次試試！~";
            $lineBot->setContext('orderInfo', 'reset');
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            return;
        }
        // 已確認訂單
        if ($userMessage == '1') {
            if (!$currentState['selectedGroupBuy']) {
                $lineBot->replyTextMessage($client, $event, '發生錯誤了，沒有讀取到選擇團購單號');
                return;
            }
            $selectedNum = $currentState['selectedGroupBuy'];  // 選擇的團購單號
            $groupBuys = $lineBot->getGroupBuy();
            $selectedGroupBuy = $groupBuys[$selectedNum - 1];  // 選擇的團購單
            // 建立 StdClass 物件，指定欄位名稱
            $orderInfo = new stdClass();
            $orderInfo->groupBuyId = $selectedGroupBuy['id'];
            $orderInfo->orderName = $lineBot->getNickName();
            $orderInfo->fieldId = uniqid();
            $orderInfo->orderMeal = $currentState['orderInfo'][0];
            $orderInfo->orderPrice = $currentState['orderInfo'][1];
            $orderInfo->orderNumber = $currentState['orderInfo'][2];
            // 判斷備註是否存在？
            if (!empty($currentState['orderInfo'][3])) {
                $orderInfo->orderRemark = $currentState['orderInfo'][3];;
            }
            /*
            stdClass Object
            (
                [groupBuyId] => 210811145642
                [orderName] => 小豬
                [orderMeal] => 雞排飯
                [orderPrice] => 90
                [orderNumber] => 1
            )
             */
            $orderData = json_decode(json_encode($orderInfo), true);  // StdClass to Array
            $result = $lineBot->postOrder($orderData);
            $lineBot->setContext('orderMode', 'reset');
            // todo: 清除所有狀態
            $lineBot->replyTextMessage($client, $event, '確認訂單');
            return;
        }
        return;
    }


    // 菜單選項
    if ($currentState['orderMode'] == STATE_MENU_OPTIONS) {
        $userMessage = (int)$userMessage;
        // 回上一步
        if ($userMessage === 0) {
            $lineBot->setContext('orderMode', 'reset');
            $lineBot->setContext('selectedGroupBuy', 'reset');
            $lineBot->replyTextMessage($client, $event, "【取消選擇團購單】\n\n哈囉~我已經幫你取消了，請回上一步再重選一次團購單吧！");
            return;
        }
        // 顯示菜單
        if ($userMessage === 1) {
            $groupBuyKey = $userMessage - 1;
            $groupBuys = $lineBot->getGroupBuy();
            $storeId = $groupBuys[$groupBuyKey]['store_id'];
            $menuUrl = $lineBot->getGroupBuyMenu($storeId);
            $lineBot->replyImageMessage($client, $event, $menuUrl);
            return;
        }
        // 開始點餐
        if ($userMessage === 2) {
            $sendMessage = "【開始點餐】 格式如下：\n\n";
            $sendMessage .= "餐名 價格 數量 備註\n";
            $sendMessage .= "例：雞排飯 90 1 不要飯\n\n";
            $sendMessage .= "p.s. 文字用半型空白分隔\n\n";
            $sendMessage .= "請告訴我你要點什麼？";
            $lineBot->setContext('orderMode', 'postOrder');
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            return;
        }
        return;
    }


    // 調出目前團購單
    if ($currentState['state'] == STATE_ORDER) {
        $lineBot->setContext('orderMode', 'chooseGroupBuy');
        $groupBuys = $lineBot->getGroupBuy();
        $groupBuysCount = count($groupBuys);
        $sendMessage = "【選擇團購單】\n嗨！{$nickName}，目前共有 {$groupBuysCount} 張團購單：\n";
        foreach ($groupBuys as $key => $groupBuy) {
            $snNum = $key + 1;
            $sendMessage .= "{$snNum}. {$groupBuy['store_name']}\n";
        }
        $sendMessage .= "\n【接下來】\n按 0 取消\n按 要參加的團購單號";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }


    $lineBot->replyTextMessage($client, $event, 'END');
    die();

// 測試用
//    $data = json_encode($currentState[CONTEXT_STATE], JSON_UNESCAPED_UNICODE);
//    $sql = "INSERT INTO group_buy (id, store_name, store_phone, group_host, end_time, store_id) VALUES (0001, '{$data}' , '1', '1', '2020-07-04 18:21:00', 15);";
//    connect_mysql($sql);
//    die();
}

// 同時會有多個 $event
foreach ($client->parseEvents() as $event) {
    lineBotHandler($client, $event);
}

class LineBot
{
    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }


    public function getGroupBuy(): array
    {
        $today = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM group_buy WHERE end_time >= '$today';";  // 交給資料庫去比對 大於今天的團購單
        $connect = new Connect();
        $numRows = $connect->query($sql);

        $groupBuys = array();
        while ($rows = $numRows->fetch_assoc()) {
            $groupBuys[] = $rows;
        }
        return $groupBuys;
    }


    public function setContext($stateName, $contextValue)
    {
        $users = $this->getUserData();
        if (count($users) > 1) {  // 已有資料
            $this->deleteUser();
        }

        $oldData = $this->getContext();
        $context = new stdClass();
        $context->$stateName = $contextValue;
        if (!$oldData) {  // 如果 userId 不存在就新建
            $data = json_encode($context, JSON_UNESCAPED_UNICODE);
            $this->postContext($data);
            return;
        }
        $newData = json_decode(json_encode($context, JSON_UNESCAPED_UNICODE), true);
        $mergeData = array_merge($oldData, $newData);  // Merge Array
        $mergeData = json_encode($mergeData, JSON_UNESCAPED_UNICODE);

        $this->updateContext($mergeData);  // 存在就更新
    }


    public function postContext($data)
    {
        $connect = new Connect();
        $sql = "INSERT INTO line_bot (user_id, context) VALUES ('$this->userId', '$data');";
        $connect->query($sql);
    }


    public function updateContext($data)
    {
        $connect = new Connect();
        $sql = "UPDATE line_bot set context='$data' WHERE user_id='$this->userId' LIMIT 1;";
        $connect->query($sql);
    }


    // 取得用戶 user_id, context
    public function getUserData(): array
    {
        $connect = new Connect();
        $sql = "SELECT * FROM line_bot WHERE user_id = '$this->userId';";
        $resultTemp = $connect->query($sql);
        $result = array();
        while ($rows = $resultTemp->fetch_assoc()) {
            $result[] = $rows;
        }
        return $result;
    }


    public function deleteUser()
    {
        $connect = new Connect();
        $sql = "DELETE FROM line_bot WHERE user_id = '$this->userId';";
        return $connect->query($sql);
    }


    public function getContext()
    {
        $connect = new Connect();
        $sql = "SELECT context FROM line_bot WHERE user_id = '$this->userId' LIMIT 1;";
        $resultTemp = $connect->query($sql);
        $result = array();

        // todo: 這裡不該 return false
        if ($resultTemp->num_rows < 0) return false;
        while ($rows = $resultTemp->fetch_assoc()) {
            $result = $rows;
        }
        return json_decode($result['context'], true);  // 轉成 array

    }


    public function getNickName()
    {
        $sql = "SELECT * FROM users WHERE username = '{$this->userId}' LIMIT 1;";
        $connect = new Connect();
        $resultTemp = $connect->query($sql);

        if ($resultTemp->num_rows < 0) return false;

        $result = array();
        while ($rows = $resultTemp->fetch_assoc()) {
            $result = $rows;
        }
        return $result['nick_name'];
    }


    public function postMember($nick_name)
    {
        $password = '000000';
        $sql = "INSERt INTO users (username, password, nick_name) VALUES ('$this->userId', '$password', '$nick_name');";
        $connect = new Connect();
        $connect->query($sql);
    }


    // 取得團購菜單網址，直接傳入 LINE 伺服器
    public function getGroupBuyMenu($storeId): string
    {
        $connect = new Connect();
        $sql = "SELECT images FROM store WHERE id='$storeId' LIMIT 1";
        $resultTemp = $connect->query($sql);
        $result = array();
        if ($resultTemp) {
            while ($rows = $resultTemp->fetch_assoc()) {
                $result = $rows;
            }
        }
        $imagePath = str_replace('./', '', $result['images']);
        return 'https://' . HTTP_HOST . '/wanna-eat/wanna-eat/' . $imagePath;
    }


    public function postOrder($orderInfo)
    {
        $connect = new Connect();
        $data = $orderInfo;
        $remark = empty($data['orderRemark']) ? '' : ", '{$data['orderRemark']}'";
        $remarkFieldName = empty($data['orderRemark']) ? '' : ", order_remark";
        $sql = "INSERT INTO orders (order_id, order_name, field_id, order_meal, order_price, order_number$remarkFieldName) VALUES ('{$data['groupBuyId']}', '{$data['orderName']}', '{$data['fieldId']}', '{$data['orderMeal']}', {$data['orderPrice']}, {$data['orderNumber']}$remark);";
        return $connect->query($sql);
    }


    public function replyTextMessage($client, $event, $replayMessage)
    {
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $replayMessage,
                ))
        ));
    }


    public function replyImageMessage($client, $event, $replayImageUrl)
    {
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => array(
                array(
                    'type' => 'image',  // 訊息類型(圖片)
                    'originalContentUrl' => $replayImageUrl,  //回覆圖片
                    'previewImageUrl' => $replayImageUrl,  // 回覆的預覽圖片
                ))
        ));
    }
}