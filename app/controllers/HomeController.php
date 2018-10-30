<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Products;

class HomeController extends Controller
{

    function index(){
        return $this->view->render("home");
    }

    function bla(){
        return "blaHome";
    }

}