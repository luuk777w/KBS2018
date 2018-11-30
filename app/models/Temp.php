<?php

namespace App\Models;

use Core\Model;

class Temp extends Model
{
    public function get()
    {
        return $this->db->sql("SELECT avg(Temperature) from `coldroomtemperatures`");
    }

    public function update($username, $pass)
    {
        return $this->db->sql("SELECT * FROM `X-customers` 
        WHERE username = ? and password = ?", [$username, $pass]);
    }

}