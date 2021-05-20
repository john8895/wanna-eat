<?php
include "dbh-inc.php";

class Store extends dbh
{
    private $storeId;
    /**
     * @var mixed|null
     */
    private $storeName;
    /**
     * @var mixed|null
     */
    private $storeDescription;
    /**
     * @var mixed|null
     */
    private $storePhone;
    /**
     * @var mixed|null
     */
    private $storeCover;
    /**
     * @var mixed|null
     */
    private $storeImages;
    /**
     * @var mixed|null
     */
    private $storeFullPrice;
    /**
     * @var mixed|null
     */
    private $storeTag;

    public function __construct($storeId = 0, $storeName = null, $storeDescription = null, $storePhone = null, $storeCover = null, $storeImages = null, $storeFullPrice = null, $storeTag = null)
    {
        $this->storeId = $storeId;
        $this->storeName = $storeName;
        $this->storeDescription = $storeDescription;
        $this->storePhone = $storePhone;
        $this->storeCover = $storeCover;
        $this->storeImages = $storeImages;
        $this->storeFullPrice = $storeFullPrice;
        $this->storeTag = $storeTag;
    }

    public function getStore(): array
    {
        $sql = 'SELECT * FROM store';
        $result = $this->connect()->query($sql);
        $num_rows = $result->num_rows;
        if ($num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            foreach ($data as $k => $item) {
                $tags = explode(',', $item['store_tag']);
                $data[$k]['tags'] = $tags;
            }
            return $data;
        }
    }


    public function deleteStore(): string
    {
        $storeId = $this->storeId;
        $sql = "DELETE FROM `store` WHERE `id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param('i', $storeId);
        $stmt->execute();
//        $result = $this->connect()->prepare($sql);
//        $result->bind_param("i", $storeId);
//        $result->execute();

//        echo $storeId;
//        $sql = "DELETE FROM store WHERE id = '{$storeId}'";
        echo $sql;
//        $result = $this->connect()->query($sql);
//        $num_rows = $result->num_rows;
//        $result->close();

//        echo $num_rows;
        return 'success';
    }


    public function addStore()
    {
        // 校驗
        if (empty($this->storeName)) {
            $GLOBALS['error_message'] = '請輸入店家名稱';
        }

//    if (empty($_POST['phone'])) {
//        $GLOBALS['error_message'] = '請輸入店家電話';
//        return;
//    }
//    if (empty($_POST['description'])) {
//        $GLOBALS['error_message'] = '請輸入店家介紹';
//        return;
//    }

//        if (!empty($_POST['store_full_price'])) $store['store_full_price'] = $_POST['store_full_price'];

//        $store['name'] = $_POST['name'];
//        $store['phone'] = $_POST['phone'];
//        $store['description'] = $_POST['description'];
//        $store['store_full_price'] = 0;
//        $store['store_tag'] = $_POST['store_tag'];

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

        $sql = "INSERT INTO store (id, name, description, phone, store_cover, images, store_full_price, store_tag) values (null, '{$this->storeName}', '{$this->storeDescription}', '{$this->storePhone}', '{$this->storeCover}', '{$this->storeImages}', {$this->storeFullPrice}, '{$this->storeTag}')";
        $result = $this->connect()->query($sql);
        return 'add store success';
    }
}