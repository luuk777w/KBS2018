<?php

namespace App\Models;

use Core\Model;

class Products extends Model
{
    public function getProducts()
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID order by recommendedretailprice DESC");
    }

    public function getProductById($id) 
    {
        return $this->db->sql("SELECT * FROM stockitems JOIN stockitemholdings using(stockitemid) WHERE StockItemID = ?", [$id]);
    }

	public function getProductsbyCategoryId($id)
    {		
        return $this->db->sql("SELECT * FROM stockitems SI
        JOIN stockitemstockgroups SG ON SI.StockItemID=SG.StockitemID 
        JOIN stockgroups sgg ON SG.stockgroupid=sgg.stockgroupid 
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID
        WHERE SG.stockgroupid=?", [$id]);
    }

    public function getProductBySearchTerm($searchterm)
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID
        WHERE SI.StockItemName like ?", ["%{$searchterm}%"]);

    }
    public function orderbyname()
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID ORDER BY stockitemname");
    }
        public function orderbynamedesc()
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID ORDER BY stockitemname DESC");
    }
    public function orderbyprijs()
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID ORDER BY RecommendedRetailPrice");
    }
    public function orderbyprijsdesc()

    {
        return $this->db->sql("SELECT * FROM stockitems SI
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID ORDER BY RecommendedRetailPrice DESC");
    }
    public function default()

    {
        return $this->db->sql("SELECT * FROM stockitems SI
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID");
    }
    public function minmaxprijs($minprijs, $maxprijs)
    {
        return $this->db->sql("SELECT * FROM stockitems SI
        LEFT JOIN ( SELECT StockItemID AS ItemID, MediaURL AS PrimaryMediaURL
                    FROM stockitems_media sm 
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID WHERE RecommendedRetailPrice > ? AND RecommendedRetailPrice < ? ORDER BY RecommendedRetailPrice", [$minprijs, $maxprijs]);
    }
}
