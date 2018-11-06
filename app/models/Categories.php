<?php

namespace App\Models;

use Core\Model;

class Categories extends Model
{
    public function getCategories()
    {
        $data = $this->db->sql("SELECT * FROM stockgroups");
        //$media = $this->db->sql("select * from stockitems Join stockitems_media m using(stockitemID) where m.Primary=1");

        return $data;
    }
    public function GetCategoryMedia(){
        $media = $this->db->sql("select * from stockitems Join stockitems_media joint using(stockitemID) where joint.Primary=1");


        return $media;

    }





}