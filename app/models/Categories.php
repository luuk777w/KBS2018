<?php

namespace App\Models;

use Core\Model;

class Categories extends Model
{
    public function getCategories()
    {
        $data = $this->db->sql("SELECT * FROM stockgroups SG
        LEFT JOIN ( SELECT StockgroupID, MediaURL AS PrimaryMediaURL
                    FROM stockgroups_media sm 
                    WHERE sm.Primary = 1) m using(stockgroupid)");

        return $data;
    }

    public function getCategorynames()
    {
        return $this->db->sql("SELECT stockitemID, stockgroupname FROM stockitemstockgroups SI
        JOIN stockgroups sgg ON SI.stockgroupid=sgg.stockgroupid
        order by stockitemid");
    }
}