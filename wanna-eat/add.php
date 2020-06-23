<?php
/* filename: add.php */
require_once("../libs/Smarty.class.php");
global $smarty;
$smarty = new Smarty;

session_start();
if(isset($_SESSION['logged_in'])){
    echo '您已登入';
    $logged = true;
}else{
    $logged = false;
}
$smarty->assign('logged', $logged);

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
    if (empty($_POST['phone'])) {
        $GLOBALS['error_message'] = '請輸入店家電話';
        return;
    }
    $store['name'] = $_POST['name'];
    $store['phone'] = $_POST['phone'];

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

    /*
     * ======================
     * MySQL
     * ======================
     */
    // 數據校驗完畢 寫入資料庫
    $conn = mysqli_connect('127.0.0.1','apai01', 'maze0819','wannaeat');
    if(!$conn){
        $GLOBALS['error_message'] = '連接數據庫失敗，請洽管理人員';
        return;
    }
    $query = mysqli_query($conn,"INSERT INTO store values (null, '{$store['name']}', '{$store['phone']}', '{$store['images']}')");
    if(!$query){
        $GLOBALS['error_message'] = '數據增加失敗';
        return;
    }
    header('Location: index.php');
}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/add.tpl");