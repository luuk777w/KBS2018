<?php

namespace App\Models;

use Core\Model;

class Account extends Model
{
    public function login($username, $pass)
    {
        return $this->db->sql("SELECT * FROM `X-customers` 
        WHERE username = ? and password = ?", [$username, $pass]);
    }

    public function getAccount($id)
    {
        return $this->db->sql("SELECT * FROM `X-customers`
        WHERE CustomerID = ?", [$id]);
    }
}