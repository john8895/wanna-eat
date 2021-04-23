<?php
/* filename: edit.php */

require_once("../libs/Smarty.class.php");
/** Connect Mysql */
require_once './assets/inc/connect.php';

global $smarty;
$smarty = new Smarty;

/** Check Login Status */
require_once './assets/inc/check-login-inner.php';


// 如果有帶參數 GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    show_up($smarty);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    edit_user($smarty);
}

// 顯示數據
function show_up($smarty)
{
    if (!isset($_GET['id'])) exit('<h1>必須指定參數</h1>');
    $sql = "SELECT * FROM store WHERE id = {$_GET['id']} LIMIT 1";
    $result = connect_mysql($sql);
    $fetch_assoc = mysqli_fetch_assoc($result);
    $smarty->assign('item', $fetch_assoc);
}


// 修改數據
function edit_user($smarty)
{
    $item['id'] = $_POST['id'];
    $item['name'] = $_POST['name'];
    $item['phone'] = $_POST['phone'];
    $item['description'] = $_POST['description'];
    $item['store_full_price'] = $_POST['store_full_price'] === '' ? 0 : $_POST['store_full_price'];
    $smarty->assign('item', $item);
    $item['store_tag'] = $_POST['store_tag'];

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

    // if field is not exist
    if (!isset($_FILES['images'])) {
        $GLOBALS['error_message'] = '請正常使用表單';
        return;
    }
    // if has upload file
    if (!empty($_FILES['store_cover']) && $_FILES['store_cover']['error'] === UPLOAD_ERR_OK) {
        // 檔案類型校驗
        $image_type = array('image/png', 'image/jpg', 'image/webp', 'image/gif', 'image/jpeg');
        // 使用 in_array 不是字串比對，in_array 第三個參數如果沒傳，預設會是 Object ，所以必須填true ，使之為 array
        if (!in_array($_FILES['store_cover']['type'], $image_type, true)) {
            $GLOBALS['error_message'] = '上傳的檔案不是圖片格式，請重新上傳';
            return;
        }

        $ext = pathinfo($_FILES['store_cover']['name'], PATHINFO_EXTENSION);
        $source = $_FILES['store_cover']['tmp_name'];
        // TODO:刪除原本的檔案
        $dest = './archive/cover-' . uniqid() . '.' . $ext;
        if (!move_uploaded_file($source, $dest)) {
            $GLOBALS['error_message'] = '上傳失敗';
            return;
        }
        $item['store_cover'] = $dest;
        $sql_store_cover = ",store_cover='{$item['store_cover']}'";
    }else{
        $sql_store_cover = "";
    }

    // if has upload file
    if (!empty($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
        // 檔案類型校驗
        $image_type = array('image/png', 'image/jpg', 'image/webp', 'image/gif', 'image/jpeg');
        // 使用 in_array 不是字串比對，in_array 第三個參數如果沒傳，預設會是 Object ，所以必須填true ，使之為 array
        if (!in_array($_FILES['images']['type'], $image_type, true)) {
            $GLOBALS['error_message'] = '上傳的檔案不是圖片格式，請重新上傳';
            return;
        }

        $ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
        $source = $_FILES['images']['tmp_name'];
        // TODO:刪除原本的檔案
        $dest = './archive/' . uniqid() . '.' . $ext;
        if (!move_uploaded_file($source, $dest)) {
            $GLOBALS['error_message'] = '上傳失敗';
            return;
        }
        $item['images'] = $dest;
        $sql_image = ",images='{$item['images']}'";
    }else{
        $sql_image = "";
    }

    // 更新數據
    $sql = "UPDATE store SET name='{$item['name']}', phone='{$item['phone']}', store_full_price={$item['store_full_price']}, description='{$item['description']}'{$sql_store_cover}{$sql_image}, store_tag='{$item['store_tag']}' WHERE id = {$item['id']};";
    connect_mysql($sql);
    header('Location: index.php');
}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/edit.tpl");