<?php

namespace App\Models;

use Core\Model;

class Orders extends Model
{
    public function addOrder($customerID, $orderDate, $addressID, $PostNLTT)
    {
        return $this->db->sql("Insert into `X-orders`(CustomerID, OrderDate, AddressID, PostNLTT)
        Values (?, ?, ?, ?)", [$customerID, $orderDate, $addressID, $PostNLTT]);
    }

    public function addOrderLine($OrderID, $StockItemID, $Quantity, $Price, $TaxRate)
    {
        return $this->db->sql("Insert into `X-orderlines`(OrderID, StockItemID, Quantity, Price, TaxRate)
        Values (?, ?, ?, ?, ?)", [$OrderID, $StockItemID, $Quantity, $Price, $TaxRate]);
    }

    public function getEmptyOrderByCustomerID($customerID)
    {
        return $this->db->sql("SELECT * FROM `X-orders`
                                WHERE CustomerID = ? 
                                AND OrderID NOT IN (SELECT OrderID 
                                                    FROM `X-orderlines`)", [$customerID]);
    }

    public function removeAllEmptyOrdersByCustomerID($customerID) 
    {
        return $this->db->sql("DELETE FROM `X-orders`
                                WHERE CustomerID = ? 
                                AND OrderID NOT IN (SELECT OrderID 
                                                    FROM `X-orderlines`)", [$customerID]);
    }
}