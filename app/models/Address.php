<?php

namespace App\Models;

use Core\Model;

class Address extends Model
{
    public function addAddress($CustomerID, $IsDeliveryAddress, $IsPostNLServicePoint, $Street, $HouseNr, $PostalCode, $City, $Country)
    {
        return $this->db->sql("Insert into `X-address`(CustomerID, IsDeliveryAddress, IsPostNLServicePoint, Street, HouseNr, PostalCode, City, Country)
        Values (?, ?, ?, ?, ?, ?, ?, ?)", [$CustomerID, $IsDeliveryAddress, $IsPostNLServicePoint, $Street, $HouseNr, $PostalCode, $City, $Country]);
    }

    public function getAddressByPostalCodeAndHouseNr($PostalCode, $HouseNr) 
    {
        return $this->db->sql("SELECT * FROM `X-address`
                                WHERE Postalcode = ? AND HouseNr = ?", [$PostalCode, $HouseNr]);
    }

    public function getAddressByUID($userid)
    {
        return $this->db->sql("SELECT * FROM `X-address`
                                WHERE CustomerID = ?", [$userid]);
    }

    public function updateNAW($adresid, $input)
    {
        return $this->db->sql("Update `X-address`
                                set ?
                                WHERE AdressID = ?", [$input,$adresid]);
    }

}