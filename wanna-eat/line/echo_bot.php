<?php
require_once(__DIR__ . '/LINEBotTiny.php');
require_once('../assets/include/order.inc.php');
require_once('../assets/inc/connect.php');
require_once('../assets/include/connect.inc.php');

//$userId = 'Uadc6b08a44873820d6446554f0f2f790';
//$lineBot = new LineBot($userId);
//$nickName = $lineBot->getNickName();  // 取得暱稱(有userId)
//var_dump($nickName);
//die();

$channelAccessToken = 'fLjvFXAZfRDqcTMr5tSOaMAYAeA3kv03qYjcFkYQHjy8GntgfAM491knLIwvvH6g1QBH312V2IVYO0UlWJb/pgb/TkLuqNywQQiQHwiamOEl5JmUeR2kHQ4+CLifZ63q6597VUGSjIsRz7A+cUgBIQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '42699015866d7b2329e0f9fa2cfebce0';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);


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

    if ($currentState['state'] === 'postMember') {
        // 輸入暱稱建立帳號
        $nickName = $userMessage;
        $lineBot->postMember($nickName);
        $lineBot->setContext('state', 'memberSuccess');
        $sendMessage = "帳號幫你建立好囉，你的暱稱是{$nickName}，登入密碼是000000，請輸入 order 開始訂餐";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }

    if ($userMessage !== 'order') {
        $sendMessage = "嗨！若要開始訂餐請輸入 order";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }


    // 輸入 order 之後...
    if (!$currentState) {  // 如果沒有狀態，登記為 order
        $lineBot->setContext('state', 'order');
    }

    // 帳號不存在，提示輸入暱稱
    if (!$nickName) {
        $lineBot->updateContext('state', 'postMember');
        $sendMessage = "嗨！帳號不存在，請輸入你的暱稱，幫你建立帳號喔！";
        $lineBot->replyTextMessage($client, $event, $sendMessage);
        return;
    }

    if ($currentState['state'] !== 'order') {  // 如果狀態不是 order 改為 order
        $lineBot->updateContext('state', 'order');
    }


    // 進入訂餐流程
//    $lineBot->replyTextMessage($client, $event, '進入訂餐模式');

    // userId 存在
    $sendMessage = "嗨！{$nickName}，歡迎回來！目前團購單如下：";
    $lineBot->replyTextMessage($client, $event, $sendMessage);

// 測試用
//    $data = json_encode($currentState['state'], JSON_UNESCAPED_UNICODE);
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
    public $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }


    public function setContext($stateName, $contextValue)
    {
        $context = new stdClass();
        $context->$stateName = $contextValue;
        $data = json_encode($context, JSON_UNESCAPED_UNICODE);

        if(!$this->getContext()){  // 如果資料不存在就新建
            $this->postContext($data);
            return;
        }
        $this->updateContext($stateName, $contextValue);  // 存在就更新
    }


    public function postContext($data)
    {
        $connect = new Connect();
        $sql = "INSERT INTO line_bot (user_id, context) VALUES ('$this->userId', '$data');";
        $connect->query($sql);
    }


    public function updateContext($stateName, $contextValue)
    {
        $connect = new Connect();
        $context = new stdClass();
        $context->$stateName = $contextValue;
        $data = json_encode($context, JSON_UNESCAPED_UNICODE);
        $sql = "UPDATE line_bot set context='$data' WHERE user_id='$this->userId' LIMIT 1;";
        $connect->query($sql);
    }


    public function getContext()
    {
        $connect = new Connect();
        $sql = "SELECT context FROM line_bot WHERE user_id = '$this->userId' LIMIT 1;";
        $resultTemp = $connect->query($sql);
        if ($resultTemp->num_rows > 0) {
            $result = $connect->fetch_assoc($resultTemp);
            return json_decode($result['context'], true);  // 轉成 array
        } else {
            return false;
        }
    }


    public function getNickName()
    {
        $sql = "SELECT * FROM users WHERE username = '{$this->userId}' LIMIT 1;";
        $connect = new Connect();
        $resultTemp = $connect->query($sql);
        if ($resultTemp->num_rows > 0) {
            $result = $connect->fetch_assoc($resultTemp);
            return $result['nick_name'];
        } else {
            return false;
        }
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

die();

foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message': //訊息觸發
            $message = $event['message'];
            if (strtolower($message['type']) == "text") {
                // 取得 User ID
                // 輸入 order 進入訂餐流程
                // 請輸入會員名稱
                // 比對資料庫，如果不存在，請輸入新會員名稱
//                $userId = 'Uadc6b08a44873820d6446554f0f2f790';
//                $userId = '01';

                // 如果存在，顯示會員名稱
//                $data = json_encode($event);
//                $sql = "INSERT INTO orders (order_id, order_name, order_meal, order_price, order_number, order_remark, field_id) VALUES ({$this->order_id}, '{$this->order_name}', '{$this->order_meal}', {$this->order_price}, {$this->order_number}, '{$this->order_remark}', '{$this->field_id}')";
//                $sql = "INSERT INTO group_buy (id, store_name, store_phone, group_host, end_time, store_id) VALUES (0001, '{$data}' , '1', '1', '2020-07-04 18:21:00', 15);";
//                connect_mysql($sql);

//                $lineOrder = new Order();
//                $orderName = $message['text'];
//                $temp = $lineOrder->linePostOrder($orderName);
//                if ($temp === 'success') {
                // 後端收到資料之後
//                    $response = $bot->getProfile('<userId>');
//                    if ($response->isSucceeded()) {
//                        $profile = $response->getJSONDecodedBody();
//                        echo $profile['displayName'];
//                        echo $profile['pictureUrl'];
//                        echo $profile['statusMessage'];
//                    }
                // 載入LINE BOT
//                    $bot = new LINEBot(
//                        new CurlHTTPClient($channelAccessToken),
//                        ['channelSecret' => $channelSecret]
//                    );
//
//                    $response = $bot->getProfile($event->getUserId());
////                    $profile = '';
//                    if ($response->isSucceeded()) {
//                        $profile = $response->getJSONDecodedBody();
//                        //$profile 為陣列，內容裡會有對方的姓名、userId(這不確定是不是會變動)、圖像網址、狀態訊息
//                    }


//                $client->replyMessage(array(
//                    'replyToken' => $event['replyToken'],
//                    'messages' => array(
//                        array(
//                            'type' => 'text',
//                            'text' => '您的訊息收到囉！',
////                                'text' => $userName,
////                                'text' => $event['timestamp'],
////                                'text' => $event['source']['userId'],
////                                'text' => $profile['displayName'],
//                        ))
//                ));

//                }  // if(success)
//                file_put_contents("debug.txt", file_get_contents("php://input") . "\r\n", FILE_APPEND);

//                $client->replyMessage(array(
//                    'replyToken' => $event['replyToken'],
//                    'messages' => array(

//                        array(
//                            'type' => 'text',  // 訊息類型 (文字)
//                            'text' => 'Hello, World!'  // 回覆訊息
//                        )
//                        array(
//                            'type' => 'image',  // 訊息類型(圖片)
//                            'originalContentUrl' => 'https://www.starpng.com/public/uploads/preview/panda-png-11582388237zzoycmriwv.png',  //回覆圖片
//                            'previewImageUrl' => 'https://www.starpng.com/public/uploads/preview/panda-png-11582388237zzoycmriwv.png',  // 回覆的預覽圖片
//                        )
//                        array(
//                            'type' => 'video', //訊息類型 (影片)
//                            'originalContentUrl' => 'https://api.reh.tw/line/bot/example/assets/videos/example.mp4', //回覆影片
//                            'previewImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg' //回覆的預覽圖片
//                        )
//                        array(
//                            'type' => 'audio', //訊息類型 (音樂)
//                            'originalContentUrl' => $audiofileurl, //回覆音樂
//                            'duration' => $milliseconds //音樂長度 (毫秒)
//                        )
//                        array(
//                            'type' => 'location', //訊息類型 (位置)
//                            'title' => 'Example location', //回覆標題
//                            'address' => '台灣高雄市三民區大昌一路 98 號 (立志中學)', //回覆地址
//                            'latitude' => 22.653742, //地址緯度
//                            'longitude' => 120.32652400000006 //地址經度
//                        )
//                        array(
//                            'type' => 'sticker', //訊息類型 (貼圖)
//                            'packageId' => 1, //貼圖包 ID
//                            'stickerId' => 1 //貼圖 ID
//                        )
//                        array(
//                            'type' => 'template', //訊息類型 (模板)(手機才看得到)
//                            'altText' => 'Example buttons template', //替代文字
//                            'template' => array(
//                                'type' => 'buttons', //類型 (按鈕)
//                                'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', //圖片網址 <不一定需要>
//                                'title' => 'Example Menu', //標題 <不一定需要>
//                                'text' => 'Please select', //文字
//                                'actions' => array(
//                                    array(
//                                        'type' => 'postback', //類型 (回傳)
//                                        'label' => 'Postback example', //標籤 1
//                                        'data' => 'action=buy&itemid=123' //資料
//                                    ),
//                                    array(
//                                        'type' => 'message', //類型 (訊息)
//                                        'label' => 'Message example', //標籤 2
//                                        'text' => 'Message example' //用戶發送文字
//                                    ),
//                                    array(
//                                        'type' => 'uri', //類型 (連結)
//                                        'label' => 'Uri example', //標籤 3
//                                        'uri' => 'https://github.com/GoneToneStudio/line-example-bot-tiny-php' //連結網址
//                                    )
//                                )
//                            )
//                        )

//                    )));


            }


//            switch ($message['type']) {
//                case 'text': //訊息為文字
////                    require_once('includes/text.php'); //Type: Text
//                    $client->replyMessage(array(
//                        'replyToken' => $event['replyToken'],
//                        'messages' => array(
//                            array(
//                                'type' => 'text',
////                                'text' => $message['text'],
////                                'text' => $profile['displayName']
//                                'text' => '你好'
//                            )
//                        )
//                    ));
//                    break;
//                default:
////                    error_log('Unsupported message type: ' . $message['type']);
//                    break;
//            }
            break;
//        case 'postback': //postback 觸發
//            //require_once('postback.php'); //postback
//            break;
//        case 'follow': //加為好友觸發
//            $client->replyMessage(array(
//                'replyToken' => $event['replyToken'],
//                'messages' => array(
//                    array(
//                        'type' => 'text',
//                        'text' => '您好，這是一個範例 Bot OuO
//範例程式開源至 GitHub (包含教學)：
//https://github.com/GoneTone/line-example-bot-php'
//                    )
//                )
//            ));
//            break;
//        case 'join': //加入群組觸發
//            $client->replyMessage(array(
//                'replyToken' => $event['replyToken'],
//                'messages' => array(
//                    array(
//                        'type' => 'text',
//                        'text' => '大家好，這是一個範例 Bot OuO
//範例程式開源至 GitHub (包含教學)：
//https://github.com/GoneTone/line-example-bot-php'
//                    )
//                )
//            ));
//            break;
        default:
//            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};