<?php
require '../libs/Smarty.class.php';
/** Connect Mysql */
//require_once './assets/inc/connect.php';
require_once './assets/includes/store-inc.php';

$smarty = new Smarty;
$smarty->setTemplateDir('./templates/');

/** Check Login Status */
require_once './assets/inc/check-login.php';

//class mainData
//{
//    public function getStore()
//    {
//        $sql = 'SELECT * FROM store';
//        $result = connect_mysql($sql);
//        $stores = array();
//        while ($rows = mysqli_fetch_assoc($result)) {
//            $stores[] = $rows;
//        }
//        foreach ($stores as $k=>$item) {
//            $tags = explode(',', $item['store_tag']);
//            $stores[$k]['tags'] = $tags;
//        }
//        return $stores;
//    }
//}

$stores = new Store();

//$main = new mainData();
//$smarty->assign('stores', $main->getStore());
$smarty->assign('stores', $stores->getStore());
$smarty->display('layout.tpl');