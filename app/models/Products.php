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
                    WHERE sm.Primary = 1) m ON SI.StockItemID = m.ItemID");
    }

    public function getProductById($id) 
    {
        return $this->db->sql("SELECT * FROM stockitems WHERE StockItemID = ?", [$id]);
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


}
