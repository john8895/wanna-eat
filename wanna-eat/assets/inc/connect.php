<?php
require_once 'config.php';

function connect_mysql($sql){
    $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if($conn->connect_error) exit('<h1>Database read failure</h1>');
    mysqli_set_charset($conn, 'utf8');

    if(!$result = $conn -> query($sql)) exit('<h1>Operation database failed</h1>');
    $conn->close();
    return $result;
}

class Connection
{
    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public function __construct()
    {
        $this->dbHost = DB_HOST;
        $this->dbName = DB_NAME;
        $this->dbUser = DB_USER;
        $this->dbPassword = DB_PASSWORD;
    }

    private function connect()
    {
        return new PDO("mysql:host=$this->dbHost;dbname=$this->dbName;charset=utf8", $this->dbUser, $this->dbPassword);
    }

    public function query($sql)
    {
        $conn = $this->connect();
        $result = $conn->prepare($sql);
        $conn = null;  // Close connection
        return $result;
     }
}

//$conn = new Connection();
//$sql = "SELECT * FROM group_buy WHERE id=:id";
//$sth = $conn->query($sql);
//$sth->execute(array(':id' => '200705164726'));
//print_r($sth->fetchAll());