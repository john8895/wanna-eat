<?php
require_once(__DIR__ . '/LINEBotTiny.php');
require_once('../assets/include/order.inc.php');
require_once('../assets/inc/connect.php');
require_once('../assets/include/connect.inc.php');

// State
//define('CONTEXT_STATE','state');
//define('CONTEXT_ORDER_MODE', 'orderMode');
//define('STATE_ORDER', 'order');
//define('STATE_POST_MEMBER', 'postMember');
//define('STATE_CHOOSE_GROUP_BUY', 'chooseGroupBuy');
//
//// Command
//define('COMMEND_RESET', '#reset');
//define('COMMEND_ORDER', '#order');

$channelAccessToken = 'fLjvFXAZfRDqcTMr5tSOaMAYAeA3kv03qYjcFkYQHjy8GntgfAM491knLIwvvH6g1QBH312V2IVYO0UlWJb/pgb/TkLuqNywQQiQHwiamOEl5JmUeR2kHQ4+CLifZ63q6597VUGSjIsRz7A+cUgBIQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '42699015866d7b2329e0f9fa2cfebce0';
//ini_set('display_errors','on');
//$userId = '00';
//$lineBot = new LineBot($userId);
//$lineBot->setContext('state', 'order');
//$userId = 'Uadc6b08a44873820d6446554f0f2f790';
//$lineBot = new LineBot($userId);

//$lineBot->setContext(CONTEXT_STATE, STATE_ORDER);
//echo '#reset' == COMMEND_RESET;
////$data = $lineBot->getContext();
////var_dump($data);;
//$data = CONTEXT_STATE;
//echo $data == CONTEXT_STATE;

//$context = new stdClass();
//$context->CONTEXT_STATE = STATE_ORDER;
//$lineBot->setContext('orderMode', STATE_CHOOSE_GROUP_BUY);
////var_dump($context);
//die();

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
//$testEvent = json_encode(array(
//    'type' => 'message',
//    'message' => array(
//        'type' => 'text',
//        'id' => '14548533365070',
//        'text' => '1'
//    ),
//    'timestamp' => '14548533365070',
//    'source' => array(
//        'type' => 'user',
//        'userId' => '14548533365070'
//    ),
//    'replayToken' => '86e51a4503d94b96bdad4640e7671c65',
//    'mode' => 'active'
//), true);
//echo $testEvent;

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
    if ($userMessage == '#reset') {
        $context = '';
        $lineBot->updateContext($context);
        $lineBot->replyTextMessage($client, $event, '取消所有狀態');
        return;
    }
    // 操作指令 END

    if ($currentState['state'] == 'postMember') {
        // 輸入暱稱建立帳號
        $nickName = $userMessage;
        $lineBot->postMember($nickName);
        $lineBot->setContext('state', 'memberCreated');
        $sendMessage = "帳號幫你建立好囉，你的暱稱是{$nickName}，網站登入密碼是000000，請輸入 #order 開始訂餐";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }

    // 輸入 order 之後...
    if ($userMessage == '#order') {
        $lineBot->setContext('state', 'order');
        // 重新取得使用者狀態
        $currentState = $lineBot->getContext();
    }

    // todo: error 一直卡在這裡
    if ($currentState['state'] != 'order') {
        $sendMessage = "嗨！若要開始訂餐請輸入 #order";
//        $lineBot->replyTextMessage($client, $event, $currentState['state']);  // TEST
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

    $lineBot->setContext('orderMode', 'chooseGroupBuy');

    // 輸入大於總團購單數
    $groupBuys = $lineBot->getGroupBuy();
    $groupBuysCount = count($groupBuys);
    if ($userMessage > $groupBuysCount) {
        $lineBot->replyTextMessage($client, $event, '喂~看清楚再輸入啦，沒這選項吧，重新輸入！');
        return;
    }

    if ($userMessage === '0') {
        $sendMessage = "蛤~不訂囉？那下次再來嘿！愛你喔！~^^\"";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
//        $lineBot->setContext('state', '');
//        $lineBot->setContext('orderMode', '');
        return;
    }

    if ($userMessage <= $groupBuysCount) {
        $lineBot->setContext('orderMode', 'selected');
        $lineBot->replyTextMessage($client, $event, "你點了編號 $userMessage");
    }

    // 調出目前團購單
    if (true) {
        $groupBuys = $lineBot->getGroupBuy();
        $groupBuysCount = count($groupBuys);

        $sendMessage = "嗨！{$nickName}，目前共有 {$groupBuysCount} 張團購單：\n";
        foreach ($groupBuys as $key => $groupBuy) {
            $snNum = $key + 1;
            $sendMessage .= "{$snNum}. {$groupBuy['store_name']}\n";
        }
        $sendMessage .= "\n請輸入你要參加的團購單編號，如 2 或輸入 0 取消";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }

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
        $oldData = $this->getContext();
//        $hasUserId = $this->getUserId();
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


//    public function getUserId(): bool
//    {
//        $connect = new Connect();
//        $sql = "SELECT user_id FROM line_bot WHERE user_id = '$this->userId';";
//        $resultTemp = $connect->query($sql);
//        $result = array();
//
//        if ($resultTemp->num_rows <= 0) return false;
//        return true;
////        while ($rows = $resultTemp->fetch_assoc()) {
////            $result = $rows;
////        }
////        return json_decode($result['context'], true);  // 轉成 array
//    }

    public function getContext()
    {
        $connect = new Connect();
        $sql = "SELECT context FROM line_bot WHERE user_id = '$this->userId' LIMIT 1;";
        $resultTemp = $connect->query($sql);
        $result = array();

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


    /**
     * @param $client
     * @param $event
     * @param $sendMessage
     */
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