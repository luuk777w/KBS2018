<?php

namespace Core;

require "./vendor/autoload.php";

class App
{
    function start()
    {
        $Router = new Routing();
        $_GET['r'] = $_GET['r'] ?? "";
        $RouteArray = $Router->GetRoute($_GET['r']);

        $getController = $RouteArray[0];
        $method = $RouteArray[1];
        $RouteArray[2] = $RouteArray[2] ?? "";
        $p = $RouteArray[2];
        
        $prepareController = "\\App\\Controllers\\".$getController;
        $controller = new $prepareController();

        if(is_array($p)){
            return $controller->$method(...$p);
        }

        return $controller->$method();

    }

}