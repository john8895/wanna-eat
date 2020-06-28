<?php

$json_data = '[{"name":"小毛","meal":"雞排飯","price":60},{"name":"阿包","meal":"雞排飯","price":60}]';

//var_dump(gettype($json_data));

$data = json_decode($json_data, true);  // true -> to array not to stdClass

//foreach ($data as $item){
//    var_dump($item['name']);
//}

var_dump($data);