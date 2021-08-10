<?php
require_once('./LINEBotTiny.php');
require_once '../assets/include/order.inc.php';
require_once '../assets/inc/connect.php';
require_once '../assets/include/connect.inc.php';

//$userId = 'Uadc6b08a44873820d6446554f0f2f790';
//$userId = '01';
//$sql = "SELECT * FROM users WHERE username = '{$userId}' LIMIT 1;";
//$result = connect_mysql($sql);
////$result = $resultTemp->fetch_assoc();
//if ($result->num_rows > 0) {
//    $resultItems = array();
//    while ($rows = $result->fetch_assoc()) {
//        $resultItems = $rows;
//    }
//    echo '嗨！' . $resultItems['nick_name'] . ' 歡迎回來！';
//    var_dump($resultItems);
//} else {
//    echo '此帳號不存在！';
//}
//die();

//$conn = new Connect();
//$sql = "SELECT * FROM group_buy WHERE id = 1;";
//$result = $conn->query($sql);
//print_r($result);
//die();
//$result = connect_mysql($sql);
//if ($result->num_rows > 0) {
//    $resultItems = array();
//    while ($rows = $result->fetch_assoc()) {
//        $resultItems = $rows;
//    }
//    print_r(json_decode($resultItems['store_name'], true));
//}
//die();

//$state = new stdClass();
//$state->memberStatus = 'none';
//echo $state->memberStatus;
//die();

$channelAccessToken = 'fLjvFXAZfRDqcTMr5tSOaMAYAeA3kv03qYjcFkYQHjy8GntgfAM491knLIwvvH6g1QBH312V2IVYO0UlWJb/pgb/TkLuqNywQQiQHwiamOEl5JmUeR2kHQ4+CLifZ63q6597VUGSjIsRz7A+cUgBIQdB04t89/1O/w1cDnyilFU=';
$channelSecret = '42699015866d7b2329e0f9fa2cfebce0';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$eventArray = $client->parseEvents();
$event = call_user_func_array('array_merge', $eventArray);  // 展開二維陣列

// 如果訊息類型為文字
if ($event['message']['type'] === 'text') {
    $userMessage = strtolower($event['message']['text']);  // 使用者送出的文字

    $connect = new Connect();
    $lineBot = new LineBot();

    // 進入訂餐流程
    if ($userMessage === 'order') {
        $userId = $event['source']['userId'];
        $sql = "SELECT * FROM users WHERE username = '{$userId}' LIMIT 1;";
        $resultTemp = $connect->query($sql);
        // userId 存在
        if ($resultTemp->num_rows > 0) {
            $result = $connect->fetch_assoc($resultTemp);
            $sendMessage = "嗨！{$result['nick_name']}，歡迎回來！目前團購單如下：";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
        } else {
            // userId 不存在


            $context = 'accountBuild';
            $lineBot->postUserContext($userId, $context);

            $sendMessage = "嗨！帳號不存在，請輸入你的暱稱，幫你建立帳號喔！";
            $lineBot->replyTextMessage($client, $event, $sendMessage);
        }

//        $data = json_encode($userMessage, JSON_UNESCAPED_UNICODE);
//        $sql = "INSERT INTO group_buy (id, store_name, store_phone, group_host, end_time, store_id) VALUES (0001, '{$data}' , '1', '1', '2020-07-04 18:21:00', 15);";
//        connect_mysql($sql);
    }
}

class LineBot
{
    // 儲存使用者狀態
    public function postUserContext($userId, $context)
    {
        $connect = new Connect();
        $data = json_encode($context, JSON_UNESCAPED_UNICODE);
        $sql = "INSERT INTO line_bot (user_id, context) VALUES ('$userId', $data);";
        $connect->query($sql);
    }

    // 讀取使用者狀態
    public function getUserContext($userId)
    {

    }
    // 發送訊息給使用者
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


//$data = json_encode($userMessage, JSON_UNESCAPED_UNICODE);
//$sql = "INSERT INTO group_buy (id, store_name, store_phone, group_host, end_time, store_id) VALUES (0001, '{$data}' , '1', '1', '2020-07-04 18:21:00', 15);";
//connect_mysql($sql);

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