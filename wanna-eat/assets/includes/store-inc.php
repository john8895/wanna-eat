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
        $result = $this->connect()->prepare('DELETE FROM store WHERE id = ?');
        $storeId = $this->storeId;
        $result->bind_param('i', $storeId);
        $result->execute();
        $num_rows = $result->num_rows;

        echo $storeId;
        echo $num_rows;
//        $result = $this->connect()->query($sql);
        return 'success';
    }
}