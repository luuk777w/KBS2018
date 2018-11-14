<?php

namespace App\Models;

use Core\Model;

class Media extends Model
{
    public function GetCategoryMedia(){
        $media = $this->db->sql("select * from stockitems Join stockitems_media joint using(stockitemID) where joint.Primary=1");

        return $media;
    }

    public function getProductMediaById($id)
    {
        return $this->db->sql("SELECT * FROM stockitems_media WHERE StockItemID = ?", [$id]);
    }
}