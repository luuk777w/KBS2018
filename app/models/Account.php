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

    public function CreateAccount($array)
    {
        $vnaam = $array['vnaam'];
        $anaam = $array['anaam'];
        $tvnaam = $array['tvnaam'];
        $email = $array['email'];
        $phone = $array['telefoonNr'];
        $user = $array['username'];
        $pass = $array['pass'];

        return $this->db->sql("Insert into `X-customers`(Firstname, Lastname, Preposition, Email, PhoneNr, Username, Password)
        Values (?, ?, ?, ?, ?, ?, ?)", [$vnaam, $anaam, $tvnaam, $email, $phone, $user, $pass]);
    }
}