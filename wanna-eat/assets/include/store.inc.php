<?php

require_once 'dbh.inc.php';

class Store extends connection
{
    // 取得店家資訊
    public function getStoreById()
    {
        $storeId = $_GET['storeId'];
        $this->connect();
        $sql = "SELECT * FROM store WHERE id=:storeId LIMIT 1;";
        $sth = $this->query($sql);
        $sth->execute(array(':storeId' => $storeId));
        echo json_encode($sth->fetchAll(), JSON_UNESCAPED_UNICODE);
    }

    public function index(): array
    {
        $sql = 'SELECT * FROM store';
        $result = connect_mysql($sql);
        $stores = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $stores[] = $rows;
        }
        foreach ($stores as $k => $item) {
            $tags = explode(',', $item['store_tag']);
            $stores[$k]['tags'] = $tags;
        }
        return $stores;
    }


    public function add()
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
        if (!empty($_POST['store_full_price'])) $store['store_full_price'] = $_POST['store_full_price'];

        $store['name'] = $_POST['name'];
        $store['phone'] = $_POST['phone'];
        $store['description'] = $_POST['description'];
        $store['store_full_price'] = $_POST['store_full_price'];
        $store['store_tag'] = $_POST['store_tag'];

        // 校驗圖片
        // empty($_FILES['images'] -> 有欄位但沒填 有變數無值
        // !$_FILES['images'] -> 變數未設置 代表無此欄位 無變數

        /*
        function validationImage($imgVar){
            if (!isset($_FILES[$imgVar]) && !$_FILES[$imgVar]) {
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
        }
        */

        if (!isset($_FILES['store_cover']) && !$_FILES['store_cover']) {
            $GLOBALS['error_message'] = '請正常使用表單';
            return;
        }
        if (!empty($_FILES['store_cover']) && $_FILES['store_cover']['error'] === UPLOAD_ERR_OK) {
            // 有上傳圖且錯誤碼 === 0 -> is no error
            if (!$_FILES['store_cover']['type'] === 'image/*') {
                $GLOBALS['error_message'] = '上傳的不是圖片，請上傳圖片類型檔案';
                return;
            }
            if ($_FILES['store_cover']['size'] > 1 * 1024 * 1024) {
                $GLOBALS['error_message'] = '上傳的檔案超過 1 MB，請重新上傳';
                return;
            }

            // 校驗完成 上傳檔案
            $ext = pathinfo($_FILES['store_cover']['name'], PATHINFO_EXTENSION);
            $source = $_FILES['store_cover']['tmp_name'];
            $target = './archive/stores/cover-' . uniqid() . '.' . $ext;
            if (!move_uploaded_file($source, $target)) {
                $GLOBALS['error_message'] = '移動檔案失敗！';
                return;
            }
            $store['store_cover'] = (string)$target;
        }
        if (!$_FILES['store_cover']['size']) $store['store_cover'] = '';


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
        if (!$_FILES['images']['size']) $store['images'] = '';

        // 數據校驗完畢 寫入資料庫
        $sql = "INSERT INTO store (id, name, description, phone, store_cover, images, store_full_price, store_tag) values (null, '{$store['name']}', '{$store['description']}', '{$store['phone']}', '{$store['store_cover']}', '{$store['images']}', {$store['store_full_price']}, '{$store['store_tag']}')";
        connect_mysql($sql);
        header('Location: index.php');
    }

    public function edit($smarty)
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
        } else {
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
        } else {
            $sql_image = "";
        }

        // 更新數據
        $sql = "UPDATE store SET name='{$item['name']}', phone='{$item['phone']}', store_full_price={$item['store_full_price']}, description='{$item['description']}'{$sql_store_cover}{$sql_image}, store_tag='{$item['store_tag']}' WHERE id = {$item['id']};";
        connect_mysql($sql);
        header('Location: index.php');
    }

    public function show($smarty)
    {
        if (!isset($_GET['id'])) exit('<h1>必須指定參數</h1>');
        $sql = "SELECT * FROM store WHERE id = {$_GET['id']} LIMIT 1";
        $result = connect_mysql($sql);
        $fetch_assoc = mysqli_fetch_assoc($result);
        $smarty->assign('item', $fetch_assoc);
    }


}