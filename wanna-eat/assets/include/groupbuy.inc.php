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
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    public function getGroupBuyHistory()
    {
        $this->connect();
        $sql = "SELECT * FROM group_buy WHERE end_time < now() ORDER BY end_time DESC;";
        $sth = $this->query($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /** Delete group buy */
    public function deleteGroupBuyByGroupId()
    {
        $groupId = $_POST['groupId'];
        session_start();
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            echo 2;  // Login Failed
            return;
        }

        $sql = "DELETE FROM group_buy WHERE id=:groupId";
        $this->connect();
        $sth = $this->query($sql);
        $sth->execute(array(':groupId' => $groupId));
        if ($this->hasError($sth)) echo 0;
        echo 1; // successfully deleted group
    }
}
//$groupBuy = new GroupBuy();
//$groupBuy->getAllContinueGroupBuys();