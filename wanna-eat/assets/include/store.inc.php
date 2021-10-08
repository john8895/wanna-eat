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

    public function getAllStores()
    {
        $sql = "SELECT * FROM store";
        $this->connect();
        $sth = $this->query($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    private function validateFields()
    {
        global $storeData;
        /***********************
         * 驗證欄位
         **********************/
        if (empty($_POST['name'])) {
            echo '請輸入店家名稱';
            return;
        }
        if (empty($_POST['phone'])) {
            echo '請輸入店家電話';
            return;
        }
        if (empty($_POST['storeFullPrice'])) {
            $storeData['storeFullPrice'] = 0;
        }

        $storeData['name'] = $_POST['name'];
        $storeData['phone'] = $_POST['phone'];
        $storeData['description'] = $_POST['description'];
        $storeData['storeFullPrice'] = $_POST['storeFullPrice'];
        $storeData['storeTag'] = $_POST['storeTag'];

        // 驗證封面
        if (!empty($_FILES['storeCover']) && $_FILES['storeCover']['error'] === UPLOAD_ERR_OK) {
            // 有上傳圖且錯誤碼 === 0 -> is no error
            if (!$_FILES['storeCover']['type'] === 'image/*') {
                echo '上傳的不是圖片，請上傳圖片類型檔案';  // 後端異常
                return;
            }
            if ($_FILES['storeCover']['size'] > 1 * 1024 * 1024) {
//                $GLOBALS['error_message'] = '上傳的檔案超過 1 MB，請重新上傳';
                echo 2;  // 圖檔過大
                return;
            }

            // 校驗完成 上傳檔案
            $ext = pathinfo($_FILES['storeCover']['name'], PATHINFO_EXTENSION);
            $source = $_FILES['storeCover']['tmp_name'];
            $target = './archive/stores/cover-' . uniqid() . '.' . $ext;
            if (!move_uploaded_file($source, $target)) {
                echo '移動檔案失敗';  // 後端異常
                return;
            }
            $storeData['storeCover'] = (string)$target;
        }
        if (!$_FILES['storeCover']['size']) {
            $storeData['storeCover'] = '';
        }

        if (!isset($_FILES['images']) && !$_FILES['images']) {
            echo '請正常使用表單';  // 後端異常
            return;
        }

        // 驗證菜單
        if (!empty($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
            // 有上傳圖且錯誤碼 === 0 -> is no error
            if (!$_FILES['images']['type'] === 'image/*') {
                echo '上傳的不是圖片，請上傳圖片類型檔案';  // 後端異常
                return;
            }
            if ($_FILES['images']['size'] > 1 * 1024 * 1024) {
                echo 2;  // 圖檔過大
                return;
            }

            // 校驗完成 上傳檔案
            $ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
            $source = $_FILES['images']['tmp_name'];
            $target = './archive/stores/' . uniqid() . '.' . $ext;
            if (!move_uploaded_file($source, $target)) {
                echo '移動檔案失敗';  // 後端異常
                return;
            }
            $storeData['images'] = $target;
        }
        if (!$_FILES['images']['size']) $storeData['images'] = '';
        return $storeData;
    }


    public function addStore()
    {
        $storeData = null;
        try {
            $storeData = $this->validateFields();
        } catch (exception $e) {
            echo $e;
        }
        $this->connect();
        $sql = "INSERT INTO store (id, name, description, phone, store_cover, images, store_full_price, store_tag) values (null, :name, :description, :phone, :storeCover, :images, :storeFullPrice, :storeTag)";
        $sth = $this->query($sql);
        $sth->execute(array(':name' => $storeData['name'], ':description' => $storeData['description'], ':phone' => $storeData['phone'], ':storeCover' => $storeData['storeCover'], ':images' => $storeData['images'], ':storeFullPrice' => $storeData['storeFullPrice'], ':storeTag' => $storeData['storeTag']));
        if ($this->hasError($sth)) echo '寫入資料庫失敗';
        echo 1;
    }

    // 餐廳修改
    public function editStore()
    {
        global $storeData;
        global $sqlStoreCover;
        global $sql_image;

        $hasImage = false;
        $hasCover = false;
        $sql_image = '';

        $storeData['id'] = $_POST['id'];
        $storeData['name'] = $_POST['name'];
        $storeData['phone'] = $_POST['phone'];
        $storeData['description'] = $_POST['description'];
        $storeData['storeFullPrice'] = $_POST['storeFullPrice'] === '' ? 0 : $_POST['storeFullPrice'];
        $storeData['storeTag'] = $_POST['storeTag'];

        // 校驗
        if (empty($_POST['name'])) {
            echo '請輸入店家名稱';
            return;
        }
        if (empty($_POST['phone'])) {
            echo '請輸入店家電話';
            return;
        }
        // if field is not exist
        if (isset($_FILES['images'])) {
            $hasImage = true;
        }
        if (isset($_FILES['storeCover'])) {
            $hasCover = true;
        }

        // 封面圖檔驗證
        function coverImageValidate()
        {
            global $storeData;  // 在function中讀取全局變數
            global $sqlStoreCover;

            // if has upload file
            if (!empty($_FILES['storeCover']) && $_FILES['storeCover']['error'] === UPLOAD_ERR_OK) {
                // 檔案類型校驗
                $image_type = array('image/png', 'image/jpg', 'image/webp', 'image/gif', 'image/jpeg');
                // 使用 in_array 不是字串比對，in_array 第三個參數如果沒傳，預設會是 Object ，所以必須填true ，使之為 array
                if (!in_array($_FILES['storeCover']['type'], $image_type, true)) {
                    echo '上傳的檔案不是圖片格式，請重新上傳';
                    return;
                }

                $ext = pathinfo($_FILES['storeCover']['name'], PATHINFO_EXTENSION);
                $source = $_FILES['storeCover']['tmp_name'];
                // TODO: 9/16 刪除原本的檔案
                $dest = './archive/cover-' . uniqid() . '.' . $ext;
                if (!move_uploaded_file($source, $dest)) {
                    echo '上傳失敗';
                    return;
                }
                $storeData['storeCover'] = $dest;
                $sqlStoreCover = ",store_cover=:storeCover";  // 有上傳才寫入sql字串
            } else {
                $sqlStoreCover = "";
            }
        }

        // 菜單圖檔驗證
        function menuImageValidate()
        {
            global $storeData;
            global $sql_image;

            // if has upload file
            if (!empty($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {
                // 檔案類型校驗
                $image_type = array('image/png', 'image/jpg', 'image/webp', 'image/gif', 'image/jpeg');
                // 使用 in_array 不是字串比對，in_array 第三個參數如果沒傳，預設會是 Object ，所以必須填true ，使之為 array
                if (!in_array($_FILES['images']['type'], $image_type, true)) {
                    echo '上傳的檔案不是圖片格式，請重新上傳';
                    return;
                }

                $ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
                $source = $_FILES['images']['tmp_name'];
                // TODO: 9/16 刪除原本的檔案
                $dest = './archive/' . uniqid() . '.' . $ext;
                if (!move_uploaded_file($source, $dest)) {
                    echo '上傳失敗';
                    return;
                }
                $storeData['images'] = $dest;
                $sql_image = ",images=:image";
            } else {
                $sql_image = "";
            }
        }

        if ($hasCover) coverImageValidate();
        if ($hasImage) menuImageValidate();

        // 更新數據
        $this->connect();
        $sql = "UPDATE store SET name=:storeName, phone=:storePhone, store_full_price=:storeFullPrice, description=:description{$sqlStoreCover}{$sql_image},store_tag=:storeTag WHERE id={$storeData['id']}";
        $sth = $this->query($sql);

        $sqlArray = [':storeName' => $storeData['name'], ':storePhone' => $storeData['phone'],':storeFullPrice' => $storeData['storeFullPrice'], ':description' => $storeData['description'], ':storeTag' => $storeData['storeTag']];
        // 有上傳封面與菜單就加入sql語句
        if ($hasCover) $sqlArray[':storeCover'] = $storeData['storeCover'];
        if ($hasImage) $sqlArray[':image'] = $storeData['images'];

        $sth->execute($sqlArray);
        if ($this->hasError($sth)) echo '寫入資料庫失敗';
        echo 1;
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
//$store = new Store();
//$store->getAllStores();