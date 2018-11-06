<?php

namespace App\Models;

use Core\Model;

class Products extends Model
{
    public function getProducts()
    {
        return $this->db->sql("SELECT * FROM stockitems SI JOIN stockitemstockgroups SG on SI.StockItemID=SG.StockitemID JOIN stockgroups sgg on SG.stockgroupid=sgg.stockgroupid ");//No remove PLS is voor category naam
    }

    public function getProductById($id) 
    {
        return $this->db->sql("SELECT * FROM stockitems WHERE StockItemID = ${id}");
    }

    public function getMediaById($id)
    {
        return $this->db->sql("SELECT * FROM stockitems_media WHERE StockItemID = ${id}");
    }
	
	public function getProductsbyCategory($id)
    {		
        $data = $this->db->sql("SELECT * FROM stockitems SI JOIN stockitemstockgroups SG on SI.StockItemID=SG.StockitemID JOIN stockgroups sgg on SG.stockgroupid=sgg.stockgroupid WHERE SG.stockgroupid=${id}");

        return $data;
    }



}