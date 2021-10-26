<?php
require_once 'dbh.inc.php';

class Group extends connection
{
    public function register()
    {
        $group['groupName'] = $_POST['groupName'];
        $group['password'] = $_POST['password'];

        $this->connect();
        $sql = "INSERT INTO `group` (group_name, `group_password`) VALUES (:groupName, :groupPassword)";
        $sth = $this->query($sql);
        $sth->execute(array(':groupName' => $group['groupName'], ':groupPassword' => $group['password']));
        if ($this->hasError($sth)) echo 0;
        echo 1;
    }
}