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

    public function connect(): PDO
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

    public function hasError($sth): bool
    {
        return $sth->errorCode() != '0000';
    }
}