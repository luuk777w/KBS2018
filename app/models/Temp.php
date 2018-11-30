<?php

namespace App\Models;

use Core\Model;

class Temp extends Model
{
    public function get()
    {
        return $this->db->sql("SELECT avg(Temperature) from `coldroomtemperatures`");
    }

    public function update($time, $temp)
    {
        return $this->db->sql("INSERT into `coldroomtemperatures` (ColdRoomSensorNumber, RecordedWhen, Temperature, ValidFrom, ValidTo)
        VALUES (1, ?, ? , ? , '9999-12-31 23:59:59')", [$time, $temp, $time]);
    }

}