<?php

namespace App\Models;

use Core\Model;

class ProductsCategories extends Model
{
    public function getCategories($id)
    {
        $data = $this->db->sql("SELECT * FROM stockitems SI JOIN stockitemstockgroups SG on SI.StockItemID=SG.StockitemID JOIN stockgroups sgg on SG.stockgroupid=sgg.stockgroupid WHERE SG.stockgroupid=$id");

        return $data;
    }



}