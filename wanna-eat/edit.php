<?php
/* filename: edit.php */
require_once("../libs/Smarty.class.php");
global $smarty;
$smarty = new Smarty;

// 如果有帶參數 GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    show_up($smarty);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    edit_user($smarty);
}

function show_up($smarty)
{
    if (!isset($_GET['id'])) exit('<h1>必須指定參數</h1>');
    $id = $_GET['id'];
    /*
     * MySQL
     */
    $conn = mysqli_connect('127.0.0.1', 'apai01', 'maze0819', 'wannaeat');
    if (!$conn) exit('<h1>數據庫連接錯誤</h1>');

    $query = mysqli_query($conn, "SELECT * FROM store WHERE id = {$id} LIMIT 1");
    if (!$query) exit('<h1>數據查詢失敗</h1>');

    $fetch_assoc = mysqli_fetch_assoc($query);
    $smarty->assign('item', $fetch_assoc);
}

function edit_user($smarty)
{
    $item['id'] = $_POST['id'];
    $item['name'] = $_POST['name'];
    $item['phone'] = $_POST['phone'];
    $smarty->assign('item', $item);

    if (empty($_POST['name'])) {
        $GLOBALS['error_message'] = '請輸入店家名稱';
        return;
    }
    if (empty($_POST['phone'])) {
        $GLOBALS['error_message'] = '請輸入店家電話';
        return;
    }

    // if field is not exist
    if (!isset($_FILES['images'])) {
        $GLOBALS['error_message'] = '請正常使用表單';
        return;
    }
    // if has upload file
    if (!empty($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
        // 檔案類型校驗
        $image_type = ['image/png', 'image/jpg', 'image/webp', 'image/gif', 'image/jpeg'];
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
    }
    // 更新數據
    /*
     * MySQL
     */
    $conn = mysqli_connect('127.0.0.1', 'apai01', 'maze0819', 'wannaeat');
    if (!$conn) exit('<h1>數據庫連接錯誤</h1>');
    $query = mysqli_query($conn, "UPDATE store SET name='{$item['name']}', phone='{$item['phone']}',images='{$item['images']}' WHERE id = {$item['id']};");
    if (!$query) exit('<h1>數據更新失敗</h1>');

    header('Location: index.php');
}


if (isset($error_message)) {
    $smarty->assign('error', $error_message);
}
$smarty->display("./templates/edit.tpl");