<?php
include "dbh-inc.php";

class Store extends dbh
{
    private $storeId;

    public function __construct($storeId=false)
    {
       $this->storeId = $storeId;
    }

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
    }

    public function deleteStore()
    {
        $sql = "DELETE FROM store WHERE id = {$this->storeId}";
        $result = $this->connect()->query($sql);
        return 'success';
    }
}