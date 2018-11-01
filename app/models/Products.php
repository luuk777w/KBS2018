<?php

namespace App\Models;

use Core\Model;

class Products extends Model
{
    public function getProducts()
    {
        $data = $this->db->sql("SELECT * FROM stockitems");

        return $data;
    }

    public function getProductById($id) 
    {
        return $this->db->sql("SELECT * FROM stockitems WHERE StockItemID = ${id}");
    }

}