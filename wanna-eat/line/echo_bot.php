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
define('STATE_ORDER_SUCCESS', 'orderSuccess');
// Command
define('COMMEND_RESET', '#reset');
define('COMMEND_ORDER', 'order');

// Test Area
//$userId = 'Uadc6b08a44873820d6446554f0f2f790';
//$lineBot = new LineBot($userId);
//////
//$selectedNum = 1;  // 選擇的團購單號
//$groupBuys = $lineBot->getGroupBuy();
//$selectedGroupBuy = $groupBuys[$selectedNum - 1];  // 選擇的團購單
//// 團購名
//$orderStore = $selectedGroupBuy['store_name'];
//$getOrders = $lineBot->getOrders();
//// 總訂購人數
//$numberOfOrders = count($getOrders);
//
//print_r($getOrders);
//$orderTotalSum = array();
//$orderNumberSum = array();
//$orderNameSum = array();
//$orderDetailsSum = array();
//foreach ($getOrders as $key => $order) {
//    $orderTotalSum[] = $order['order_price'];
//    $orderNumberSum[] = $order['order_number'];
//    $orderNameSum[] = $order['order_name'];
//
//    // 1. 小豬，雞排飯 $90 x 1 ，備註
//    // 訂購詳細
//    $snNum = ($key + 1) < 10 ? '0' . ($key + 1) : $key + 1;
//    $orderDetailsSum[] = "$snNum.{$order['order_name']}：{$order['order_meal']} \${$order['order_price']} x{$order['order_number']} {$order['order_remark']}";
//}
//// 訂單總計
//$orderTotal = array_sum($orderTotalSum);
//// 餐點份數
//$orderNumber = array_sum($orderNumberSum);
//// 全部訂購姓名
//$orderName = implode(', ', $orderNameSum);
//// 訂單詳細
//$orderDetails = $orderDetailsSum;
//print_r($orderDetails);
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
    $currentState = $lineBot->getContext();  // 取得目前狀態

    if($currentState == 'null'){
        $lineBot->replyTextMessage($client, $event, '錯誤！狀態碼為 null');
        return;
    }

    // 操作指令
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

    // state 非 order
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

    // 選擇團購單
    if ($currentState['orderMode'] == STATE_CHOOSE_GROUP_BUY) {
        // 輸入大於總團購單數
        $groupBuys = $lineBot->getGroupBuy();
        $groupBuysCount = count($groupBuys);
        if ($userMessage > $groupBuysCount) {  // 大於總團購單數
            $lineBot->replyTextMessage($client, $event, '喂~沒這選項吧，看清楚再輸入啦，重新輸入一次！');
            return;
        }
        // 輸入 0 取消訂單
        if ($userMessage == '0') {
            $sendMessage = "蛤~不訂囉？那下次再來吧！Bye Bye~";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            $lineBot->setContext('state', 'reset');
            $lineBot->setContext('orderMode', 'reset');
            return;
        }
        $groupBuys = $lineBot->getGroupBuy();
        $groupBuysCount = count($groupBuys);
        $selectedGroupBuyNumber = (int)$userMessage;
        if ($selectedGroupBuyNumber <= $groupBuysCount) {
            $sendMessage = "【點餐輸入】\n你選了 $userMessage. {$groupBuys[$selectedGroupBuyNumber - 1]['store_name']}";
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
        if ($userMessage == '0') {
            $lineBot->setContext('orderMode', 'reset');
            $sendMessage = "【取消點餐】\n已幫你取消了！\n\n";
            $sendMessage .= "【接下來】\n按 任意鍵 重新選擇團購單";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            return;
        }

        // 校驗格式
        $orderContent = $userMessage;
        $orderArray = explode(' ', $orderContent);
        $orderArrayCount = count($orderArray);
        $sendMessage = "輸入錯誤，請按照格式重新輸入\n\n";
        $sendMessage .= "【點餐格式】\n餐名 價格 數量 備註\n例：雞排飯 90 1 不要飯\n備註可填可不填\n\n【接下來】\n開始輸入吧！~\n或按 0 取消點餐";

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
        $sendMessage .= "【接下來】\n按 0 取消，重新點餐\n按 1 確認訂單，完成訂購";
        // 把選擇的餐點資訊先存入 Context 狀態
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
            $sendMessage = "請按照格式輸入\n\n";
            $sendMessage .= "【點餐格式】\n餐名 價格 數量 備註\n例：雞排飯 90 1 不要飯\n備註可不填\n\n【接下來】\n開始輸入吧！~\n或按 0 重新選擇團購單";
            $lineBot->setContext('orderInfo', 'reset');
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            return;
        }
        // 已確認訂單
        if ($userMessage == '1') {

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

            $orderData = json_decode(json_encode($orderInfo), true);  // StdClass to Array
            // 送出訂單
            $result = $lineBot->postOrder($orderData);
            $lineBot->setContext('orderMode', 'orderSuccess');
            $sendMessage = "【已完成訂餐】\n恭喜你訂餐成功！\n\n";
            $sendMessage .= "【接下來】\n按 0 結束訂餐，顯示訂購總計\n按 1 再點一張單\n按 2 重新選擇團購單";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            return;
        }
        return;
    }

    if ($currentState['orderMode'] == STATE_ORDER_SUCCESS) {
        if ($userMessage == '0') {  // 結束訂餐，查看團購單總計
            // groupBuyId
            $selectedNum = $currentState['selectedGroupBuy'];  // 選擇的團購單號
            $groupBuys = $lineBot->getGroupBuy();
            $selectedGroupBuy = $groupBuys[$selectedNum - 1];  // 選擇的團購單
            // 團購名
            $orderStore = $selectedGroupBuy['store_name'];
            $getOrders = $lineBot->getOrders();
            // 總訂購人數
            $numberOfOrders = count($getOrders);

            $orderTotalSum = array();
            $orderNumberSum = array();
            $orderNameSum = array();
            $orderDetailsSum = array();
            foreach ($getOrders as $key => $order) {
                $orderTotalSum[] = $order['order_price'];
                $orderNumberSum[] = $order['order_number'];
                $orderNameSum[] = $order['order_name'];

                // 1. 小豬，雞排飯 $90 x 1 ，備註
                // 訂購詳細
                $snNum = ($key + 1) < 10 ? '0' . ($key + 1) : $key + 1;
                $orderDetailsSum[] = "$snNum.{$order['order_name']}：{$order['order_meal']} \${$order['order_price']} x{$order['order_number']} {$order['order_remark']}";
            }
            // 訂單總計
            $orderTotal = array_sum($orderTotalSum);
            // 餐點份數
            $orderNumber = array_sum($orderNumberSum);
            // 全部訂購姓名
            $orderName = implode(', ', $orderNameSum);
            // 訂單詳細
            $orderDetails = $orderDetailsSum;

            $lineBot->deleteUser();  // 刪除此 userId 的所有狀態記錄
            $sendMessage = "【團購單統計】\n名稱：$orderStore\n訂購人數：$numberOfOrders\n訂單總計：$orderTotal\n餐點份數：$orderNumber\n\n";
            $sendMessage .= "【訂購詳細】\n";
            foreach($orderDetails as $detail){
                $sendMessage .= "$detail\n";
            }
            $sendMessage .= "\n謝謝你的使用！Bye Bye~";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            return;
        }
        if ($userMessage == '1') {  // 再點一次
            $lineBot->setContext('orderMode', 'postOrder');
            $lineBot->setContext('orderInfo', 'reset');
            $sendMessage = "【再點一張單】\n你選擇再點一張單\n\n";
            $sendMessage .= "【點餐格式】\n餐名 價格 數量 備註\n例：雞排飯 90 1 不要飯\n備註可填可不填\n\n開始輸入吧！~";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            return;
        }
        if ($userMessage == '2') {  //
            $lineBot->setContext('orderMode', 'reset');
            $lineBot->setContext('selectedGroupBuy', 'reset');
            $lineBot->setContext('orderInfo', 'reset');
            $lineBot->replyTextMessage($client, $event, "【取消選擇團購單】\n哈囉~我已經幫你取消了，請再重選一次團購單吧！\n\n【接下來】\n按 任意鍵");
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
            $lineBot->replyTextMessage($client, $event, "【取消選擇團購單】\n哈囉~我已經幫你取消了，請再重選一次團購單吧！\n\n【接下來】\n按 任意鍵");
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
            $sendMessage = "【開始點餐】\n格式如下：\n";
            $sendMessage .= "餐名 價格 數量 備註\n";
            $sendMessage .= "例：雞排飯 90 1 不要飯\n";
            $sendMessage .= "(文字用半型空白分隔)\n\n";
            $sendMessage .= "【接下來】\n輪入你要點什麼？\n或按 0 取消點餐";
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

    public function getOrders()
    {
        $connect = new Connect();
        $sql = "SELECT * FROM orders WHERE order_id = '210811145642';";
        $numRows = $connect->query($sql);

        $groupBuys = array();
        while ($rows = $numRows->fetch_assoc()) {
            $groupBuys[] = $rows;
        }
        return $groupBuys;
    }

    public function setContext($stateName, $contextValue)
    {
        $context = new stdClass();
        $context->$stateName = $contextValue;
        // 確保只有一筆該會員的資料
        $users = $this->getUserData();
        if (count($users) > 1) {  // 超過 1 筆資料
            $this->deleteUser();  // Delete All Users Data
            return;
        }
        if (count($users) <= 0) {  // userId 不存在
            $data = json_encode($context, JSON_UNESCAPED_UNICODE);
            $this->postContext($data);
            return;
        }
        $oldData = $this->getContext();
        // 合併 Context
        $newData = json_decode(json_encode($context, JSON_UNESCAPED_UNICODE), true);
        $mergeData = array_merge($oldData, $newData);  // Merge Array
        $mergeData = json_encode($mergeData, JSON_UNESCAPED_UNICODE);
        $this->updateContext($mergeData);
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