<?php

//$ch = curl_init();
//
//curl_setopt($ch, CURLOPT_URL, 'https://tw.news.yahoo.com/');
//curl_setopt($ch, CURLOPT_HEADER, false);
//
//curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
//
//
//$temp = curl_exec($ch);
//echo $temp;
//
//curl_close($ch);

//$url = "http://127.0.0.1/wanna-eat/wanna-eat/group-buy.php?id=28";
//echo file_get_contents($url);

//$homepage = file_get_contents('http://www.google.com');
//echo  $homepage;

//// Initializing curl
//$curl = curl_init();
//
//// Sending GET request to reqres.in
//// server to get JSON data
//curl_setopt($curl, CURLOPT_URL,
//    "https://reqres.in/api/users?page=2");
//
//// Telling curl to store JSON
//// data in a variable instead
//// of dumping on screen
//curl_setopt($curl,
//    CURLOPT_RETURNTRANSFER, true);
//
//// Executing curl
//$response = curl_exec($curl);
//
//// Checking if any error occurs
//// during request or not
//if($e = curl_error($curl)) {
//    echo $e;
//} else {
//
//    // Decoding JSON data
//    $decodedData =
//        json_decode($response, true);
//
//    // Outputing JSON data in
//    // Decoded form
//    var_dump($decodedData);
//}
//
//// Closing curl
//curl_close($curl);