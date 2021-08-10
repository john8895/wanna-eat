<?php
class User
{

    public function delete()
    {
        $sql = "DELETE FROM store WHERE id = {$_GET['id']};";
        connect_mysql($sql);
        echo 'success';
//    header('Location: index.php');
    }
}
