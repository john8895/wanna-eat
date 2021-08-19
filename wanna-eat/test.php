<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'wannaeat');
define('DB_USER', 'apai01');
define('DB_PASSWORD', '123456');
$connection = new PDO('mysql:host=127.0.0.1;dbname=wannaeat;charset=utf8', 'apai01', '123456');
print_r($connection);

$statement = $connection->query("SELECT * FROM orders");

//foreach($statement as $row){
//    echo $row['order_name'] . "<br>";
//}

while($row = $statement->fetch(PDO::FETCH_NUM)){
//    echo $row['order_name'] . $row['order_meal'] . $row['order_price'] . "<br>";
    print_r($row);
}
while($row = $statement->fetch(PDO::FETCH_OBJ)){
//    echo $row['order_name'] . $row['order_meal'] . $row['order_price'] . "<br>";
    print_r($row);
}
