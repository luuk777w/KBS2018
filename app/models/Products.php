<?php

namespace App\Models;

use Core\Model;

class Products extends Model
{
    public function getProducts()
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        JOIN ( SELECT StockItemID, MIN(StockGroupId) AS StockGroupId
                FROM  stockitemstockgroups
                GROUP BY StockItemID) SG ON SI.StockItemID=SG.StockitemID 
        JOIN stockgroups sgg ON SG.stockgroupid=sgg.stockgroupid
        LEFT JOIN ( SELECT StockItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.StockItemID");//No remove PLS is voor category naam
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
        $data = $this->db->sql("SELECT * FROM stockitems SI 
        JOIN stockitemstockgroups SG on SI.StockItemID=SG.StockitemID 
        JOIN stockgroups sgg on SG.stockgroupid=sgg.stockgroupid WHERE SG.stockgroupid=${id}
        LEFT JOIN ( SELECT StockItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.StockItemID");

        return $data;
    }



}