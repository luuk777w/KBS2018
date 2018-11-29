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

    public function exists($totest)
    {
        return $this->db->sql("SELECT username FROM `X-customers`
        WHERE username = ?", [$totest]);
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

    public function addCustomer($firstname, $lastname, $preposition, $email, $phonenr)
    {
        return $this->db->sql("INSERT INTO `X-customers`(Firstname, Lastname, Preposition, Email, PhoneNr)
                                VALUES (?, ?, ?, ?, ?", [$firstname, $lastname, $preposition, $email, $phonenr]);
    }

    public function getCustomerByEmail($email)
    {
        return $this->db->sql("SELECT * FROM `X-customers`
                                WHERE Email = ?", [$email]);
    }
}