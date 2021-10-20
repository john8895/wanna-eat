<?php

require_once 'dbh.inc.php';

class GroupBuy extends connection
{
    public function getAllGroupBuys()
    {
        $this->connect();
        $sql = "SELECT * FROM group_buy WHERE end_time > now() ORDER BY end_time DESC;";
        $sth = $this->query($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo  json_encode($result, JSON_UNESCAPED_UNICODE);
    }

//    public function getAllContinueGroupBuys()
//    {
//        $this->connect();
//        $sql = "SELECT * FROM group_buy WHERE end_time > now() ORDER BY end_time DESC;";
//        $sth = $this->query($sql);
//        $sth->execute();
//        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
//        print_r($result);
////        echo  json_encode($result, JSON_UNESCAPED_UNICODE);
//    }
}
//$groupBuy = new GroupBuy();
//$groupBuy->getAllContinueGroupBuys();