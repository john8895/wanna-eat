<?php

require_once(dirname(dirname(__FILE__)) . '/inc/config.php');

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

    private function connect(): PDO
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