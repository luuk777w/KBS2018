<?php

namespace App\Models;

use Core\Model;

class Products extends Model
{
    public function getProducts()
    {
        $data = $this->db->sql("SELECT * FROM stockitems SI JOIN stockitemstockgroups SG on SI.StockItemID=SG.StockitemID JOIN stockgroups sgg on SG.stockgroupid=sgg.stockgroupid ");

        return $data;
    }
    public function getProduct()
    {
        $data = $this->db->sql("SELECT * FROM stockitems WHERE StockItemName ='.$product.'");

        return $data;
    }


}