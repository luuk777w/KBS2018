<?php

namespace App\Models;

use Core\Model;

class Products extends Model
{
    public function getProducts()
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        JOIN ( SELECT StockItemID AS ItemID, MIN(StockGroupId) AS StockGroupId
                FROM  stockitemstockgroups
                GROUP BY StockItemID) SG ON SI.StockItemID=SG.ItemID 
        JOIN stockgroups sgg ON SG.stockgroupid=sgg.stockgroupid
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID");
    }

    public function getCategorynames()
    {
        return $this->db->sql("SELECT stockitemID, stockgroupname FROM stockitemstockgroups SI
JOIN stockgroups sgg ON SI.stockgroupid=sgg.stockgroupid
order by stockitemid");
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
        return $this->db->sql("SELECT * FROM stockitems SI
        JOIN stockitemstockgroups SG ON SI.StockItemID=SG.StockitemID 
        JOIN stockgroups sgg ON SG.stockgroupid=sgg.stockgroupid 
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID
        WHERE SG.stockgroupid=${id}");
    }

    public function searchProducts($searchterm)
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        JOIN ( SELECT StockItemID AS ItemID, MIN(StockGroupId) AS StockGroupId
                FROM  stockitemstockgroups
                GROUP BY StockItemID) SG ON SI.StockItemID=SG.ItemID 
        JOIN stockgroups sgg ON SG.stockgroupid=sgg.stockgroupid
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID
    WHERE SI.StockItemName like '%$?%'", $searchterm);
    }


}
