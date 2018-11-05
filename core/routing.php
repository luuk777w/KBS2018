<?php

namespace Core;

Use App\routes;

class Routing
{
    private $parameters = [];

    public function GetRoute($Getroute){

        $routes = routes::$routes;

        if($Getroute == ''){
            foreach ($routes as $key => $value){
                if('/' == $key){
                    return $value;
                }
            }
        }

        $original = $_GET['r'];
		
        if(substr($original, -1) == "/"){
            $original = rtrim($original, "/");
        }
		
		if(substr($original, 0, 1) == "/"){
            $original = ltrim($original, "/");
        }

        $explodedOriginal = explode('/', $original);

        foreach ($routes as $route => $value){

            $explodedRoute = explode('/', explode(':', $route)[1]);
            $newRoute = $this->getNewRoute($explodedRoute);
            $compareRoute = $this->getCompareRoute($explodedOriginal, $explodedRoute);

            if($newRoute == $compareRoute || $newRoute.'/' == $compareRoute ||
                '/'.$newRoute == $compareRoute || '/'.$newRoute.'/' == $compareRoute){

                if($_SERVER['REQUEST_METHOD'] === explode(':', $route)[0]) {
                    array_push($value, $this->parameters);
                    return $value;
                }
            }
        }
        return ["ErrorController", "error404"];
    }

    /**
     * Maakt een route aan zonder de parameters
     *
     * @param $explodedOriginal
     * @param $explodedRoute
     * @return string
     */
    private function getCompareRoute($explodedOriginal, $explodedRoute){
        $compareRoute = "";
        $i = 0;
        $this->parameters = [];

        foreach ($explodedOriginal as $value){

            if(array_key_exists($i, $explodedRoute) && preg_match('~{(.*?)}~', $explodedRoute[$i])){

                array_push($this->parameters, $value);
                //$this->parameters[substr($explodedRoute[$j], 1, -1)] = $value;
            } else {
                $compareRoute .= $value . '/';
            }
            $i++;
        }
        return $compareRoute;
    }

    /**
     * Maakt een route aan zonder parameters.
     * Het haalt dus alle waarden van de parameters
     * uit de URL en stop het in de variable
     *
     * @param $explodedRoute
     * @return string
     */
    private function getNewRoute($explodedRoute){
        $newRoute = "";
        $i = 0;

        foreach ($explodedRoute as $value){
            if(!preg_match('~{(.*?)}~', $value)){
                $newRoute.= $value . '/';
            }
            $i++;
        }
        return $newRoute;
    }

}