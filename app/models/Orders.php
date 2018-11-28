<?php

namespace App\Models;

use Core\Model;

class Orders extends Model
{
    public function test()
    {
        return $this->db->sql("Insert into `X-orders`(CustomerID, OrderDate, AddressID, PostNLTT)
        Values (2, '01-01-2010', 1, '123')");
    }
}
