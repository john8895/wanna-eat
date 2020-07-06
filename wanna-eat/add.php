<?php
/* filename: add.php */

require_once("../libs/Smarty.class.php");
/** Connect Mysql */
require_once './assets/inc/connect.php';

global $smarty;
$smarty = new Smarty;

/** Check Login Status */
require_once './assets/inc/check-login-inner.php';


/*
 * ======================
 * POST
 * ======================
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $smarty->assign('name', $_POST['name']);
    $smarty->assign('phone', $_POST['phone']);
    add_store();
}


function add_store()
{
    global $store;

    // 校驗
    if (empty($_POST['name'])) {
        $GLOBALS['error_message'] = '請輸入店家名稱';
        return;
    }
//    if (empty($_POST['phone'])) {
//        $GLOBALS['error_message'] = '請輸入店家電話';
//        return;
//    }
//    if (empty($_POST['description'])) {
//        $GLOBALS['error_message'] = '請輸入店家介紹';
//        return;
//    }
    $store['name'] = $_POST['name'];
    $store['phone'] = $_POST['phone'];
    $store['description'] = $_POST['description'];

    // 校驗圖片
    // empty($_FILES['images'] -> 有欄位但沒填 有變數無值
    // !$_FILES['images'] -> 變數未設置 代表無此欄位 無變數
    if (!isset($_FILES['images']) && !$_FILES['images']) {
        $GLOBALS['error_message'] = '請正常使用表單';
        return;
    }
    if (!empty($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
        // 有上傳圖且錯誤碼 === 0 -> is no error
        if (!$_FILES['images']['type'] === 'image/*') {
            $GLOBALS['error_message'] = '上傳的不是圖片，請上傳圖片類型檔案';
            return;
        }
        if ($_FILES['images']['size'] > 1 * 1024 * 1024) {
            $GLOBALS['error_message'] = '上傳的檔案超過 1 MB，請重新上傳';
            return;
        }

        // 校驗完成 上傳檔案
        $ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
        $source = $_FILES['images']['tmp_name'];
        $target = './archive/stores/' . uniqid() . '.' . $ext;
        if (!move_uploaded_file($source, $target)) {
            $GLOBALS['error_message'] = '移動檔案失敗！';
            return;
        }
        $store['images'] = $target;
    }

    // 數據校驗完畢 寫入資料庫
    $sql = "INSERT INTO store values (null, '{$store['name']}', '{$store['description']}', '{$store['phone']}', '{$store['images']}')";
    connect_mysql($sql);
    header('Location: index.php');
}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/add.tpl");