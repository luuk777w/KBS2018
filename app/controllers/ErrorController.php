<?php

namespace App\Controllers;

class ErrorController
{

    function error404(){
        return "Error 404 - Page not found";
    }

    function error405(){
        return "Error 405 - Method not allowed";
    }

}