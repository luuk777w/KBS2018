<?php

namespace Core;

class Appsettings
{
    function getConfigurationString($string) 
    {
        $open = fopen("./appsettings.json", "r");
        $file = fread($open, filesize("./appsettings.json"));
        fclose($open);

        $configString = json_decode($file)->{$string};
        return $configString;
    }

    function getConnectionArray() 
    {
        $connectionString = $this->getConfigurationString("ConnectionString");
        $connectionArray = [];
        $connectionParts = explode(';', $connectionString);

        array_push($connectionArray, $connectionParts[0] . ';' . $connectionParts[1] . ';');
        array_push($connectionArray, explode('=', $connectionParts[2])[1]);
        array_push($connectionArray, explode('=', $connectionParts[3])[1]);

        return $connectionArray;
    }


}
