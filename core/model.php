<?php

namespace Core;

class Model
{
    public $db;

    function __construct()
    {
        $this->db = new DB();
    }

}