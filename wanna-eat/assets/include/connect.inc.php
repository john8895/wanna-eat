<?php

class Connect
{
    public $DB_HOST = '127.0.0.1';
    public $DB_NAME = 'wannaeat';
    public $DB_USER = 'apai01';
    public $DB_PASSWORD = '123456';

    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD, $this->DB_NAME);
        if ($this->connection->connect_error) exit('<h1>database read failure</h1>');
        mysqli_set_charset($this->connection, 'utf8');
        date_default_timezone_set("Asia/Taipei");
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);
//        if (!$result = $this->connection->query($sql)) exit('<h1>Operation database failed</h1>');
        $this->close();
        return $result;
    }


    public function fetch_assoc($num_rows): array
    {
        $result = array();
        while ($rows = $num_rows->fetch_assoc()) {
            $result = $rows;
        }
        return $result;
    }


    private function close()
    {
        $this->connection->close();
    }
}