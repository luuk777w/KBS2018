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

}