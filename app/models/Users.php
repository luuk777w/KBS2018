<?php

namespace App\Models;

use Core\Model;

class Users extends Model
{

    public function getUser()
    {

        $data = $this->db->sql("DROP TABLE Rico FROM building WHERE name = 'Windesheim' AND height >= 5");

        $data = $this->db->read("users");

        return $data;
    }

}