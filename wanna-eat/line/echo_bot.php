<?php
require_once(__DIR__ . '/LINEBotTiny.php');
require_once('../assets/include/order.inc.php');
require_once('../assets/inc/connect.php');
require_once('../assets/include/connect.inc.php');
// Config
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
// Command
define('COMMEND_RESET', '#reset');
define('COMMEND_ORDER', 'order');

// Test Area
$orderContent = '雞排飯，90，1，不要飯';
$orderContent = explode($orderContent, '，');
print_r($orderContent);
die();

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
            $lineBot->replyTextMessage($client, $event, '喂~看清楚再輸入啦，沒這選項吧，重新輸入！');
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
        if ((int)$userMessage <= $groupBuysCount) {
            $sendMessage = "選擇成功！你選的是 $userMessage 號團購！";
            $sendMessage .= "\n\n【操作】\n按 0 取消\n按 1 顯示菜單\n按 2 直接點餐";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
            $lineBot->setContext('orderMode', 'menuOptions');
            return;
        }
    }

    // 點餐模式
    if($currentState['orderMode'] == STATE_POST_ORDER) {
        // todo: 校驗格式
        $orderContent = $userMessage;
        $orderContent = explode($orderContent, '，');
        $lineBot->replyTextMessage($client, $event, STATE_POST_ORDER);
        return;
    }

    // 菜單選項
    if($currentState['orderMode'] == STATE_MENU_OPTIONS){
       if((int) $userMessage == 0){
           $lineBot->setContext('orderMode', 'reset');
           $lineBot->replyTextMessage($client, $event, '已經幫你取消了喔，回到上一步再重選一次團購單吧！');
           return;
       }
       if((int) $userMessage == 2){
           $sendMessage = "【點餐格式】\n";
           $sendMessage .= "餐名，價格，數量，備註\n";
           $sendMessage .= "雞排飯，90，1，不要飯\n\n";
           $sendMessage .= "p.s. 以全型逗號分隔，其他方式不接受\n\n";
           $sendMessage .= "現在你可以開始點餐囉！點吧！";
           $lineBot->setContext('orderMode', 'postOrder');
           $lineBot->replyTextMessage($client, $event, $sendMessage);
           return;
       }
//        $lineBot->replyTextMessage($client, $event, 'OK');
        return;
    }

    // todo: 要做點餐
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
        $sendMessage .= "\n【操作】\n按 0 取消\n按要參加的團購單號";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }


    $lineBot->replyTextMessage($client, $event, 'OK');
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


    public function replyTextMessage($client, $event, $sendMessage)
    {
        $client->replyMessage(array(
            'replyToken' => $event['replyToken'],
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $sendMessage,
                ))
        ));
    }
}