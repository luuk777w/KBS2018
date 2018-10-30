<?php

namespace App\Controllers;

class TestController {


    function index(){
        return "TestController";
    }

    function cool($parameter1, $parameter2){
        return $parameter1 . " " . $parameter2;
    }

}