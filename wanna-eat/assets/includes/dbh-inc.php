<?php

class dbh {
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect() {
        $this->servername = '127.0.0.1';
        $this->username = 'apai01';
        $this->password = '123456';
        $this->dbname = 'wannaeat';

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

//        $conn->query("SET NAMES utf8");
        mysqli_set_charset($conn, 'utf8');
        date_default_timezone_set("Asia/Taipei");
        return $conn;
    }
}