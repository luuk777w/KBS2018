<?php

namespace App\Models;

use Core\Model;

class Categories extends Model
{
    public function getCategories()
    {
        $data = $this->db->sql("SELECT * FROM stockgroups");

        return $data;
    }

}