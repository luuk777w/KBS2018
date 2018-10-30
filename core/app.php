<?php

namespace Core;

require "./vendor/autoload.php";

class App
{

    function start()
    {
        $MC = new Routing();
        $_GET['r'] = $_GET['r'] ?? "";
        $MCArray = $MC->GetMC($_GET['r']);

        $getController = $MCArray[0];
        $method = $MCArray[1];
        $MCArray[2] = $MCArray[2] ?? "";
        $p = $MCArray[2];
        
        $prepareController = "\\App\\Controllers\\".$getController;
        $controller = new $prepareController();

        if(is_array($p)){
            return $controller->$method(...$p);
        }

        return $controller->$method();

    }

}