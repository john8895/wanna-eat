<?php

use ReCaptcha\ReCaptcha;
require_once 'dbh.inc.php';

class User extends connection
{
    // 待刪
    public function delete()
    {
        $sql = "DELETE FROM store WHERE id = {$_GET['id']};";
        connect_mysql($sql);
        echo 'success';
//    header('Location: index.php');
    }

    // Google reCaptcha v3 表單驗證
    public function recaptchaValidate()
    {
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';  // 驗證網址
        $recaptcha_secret = "6LeWwnEcAAAAAKJAokfkX5NVzlIICCvQg49w81Yi";  // 密鑰
        $recaptcha_response = $_POST['g-recaptcha-response'];  // 前端POST過來的token

        // Make and decode POST request  發送至Google reCaptcha獲取驗證資訊
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);  // return stdClass Object

        // 驗證成功進一步計算使用者分數，官方回饋分數為 0-1，分數愈接近 1 就是正常，低於 0.5 以下就可能是機器人
        // 連線至官方失敗
        if (!$recaptcha->success) {
            echo 'Connection recaptcha failed';
            return;
        }
        // 驗證成功
        if ($recaptcha->score >= 0.5) {
//            echo $recaptcha->score;
//            echo 1;
            $this->login();  // 驗證帳密
            return;
        }
        // reCAPTCHA 驗證失敗
        echo $recaptcha['error-codes'];
    }

    // 登入驗證
    private function login()
    {
        if (empty($_POST['username'])) {
            echo 2;  // 請輸入帳號
            return;
        }
        if (empty($_POST['password'])) {
            echo 2;  // 請輸入密碼
            return;
        }

        // 校驗帳號密碼
        $users['username'] = $_POST['username'];
        $users['password'] = $_POST['password'];

        $sql = "SELECT username, password FROM users WHERE username=:username AND password=:password";
        $this->connect();
        $sth = $this->query($sql);
        $sth->execute(array(':username' => $users['username'], ':password' => $users['password']));

        // 查詢不到數據
        if ($sth->rowCount() === 0) {
            echo 0;  // 帳號或密碼錯誤
            return;
        }

        // 如帳號密碼都正確，設置SESSION並跳轉頁面
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['name'] = $users['username'];
        echo 1;
    }

    // 會員註冊
    public function register(){
        $user['email'] = $_POST['email'];
        $user['password'] = $_POST['password'];
        $user['nickName'] = $_POST['nickName'];

        $sql = "INSERT INTO `users` (username, password, nick_name) VALUES (:email, :password, :nickName)";
        $this->connect();
        $sth = $this->query($sql);
        $sth->execute(array(':email' => $user['email'], ':password' => $user['password'], ':nickName' => $user['nickName']));
        if ($this->hasError($sth)) echo 0;
        echo 1;
    }
}