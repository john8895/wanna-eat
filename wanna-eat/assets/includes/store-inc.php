<?php
include "dbh-inc.php";

class Store extends dbh
{

    public function getStore()
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
//        $stores = array();
//        while ($rows = mysqli_fetch_assoc($result)) {
//            $stores[] = $rows;
//        }
//        foreach ($stores as $k=>$item) {
//            $tags = explode(',', $item['store_tag']);
//            $stores[$k]['tags'] = $tags;
//        }
//        return $stores;
    }
}
