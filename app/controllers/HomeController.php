<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Users;

class HomeController extends Controller
{

    function index(){

        $user = new Users();
        $naam = $user->getUser()[0]->username;

        $auth = new Auth();

        //$auth->makeCookie("Luuk", "admin");

        return $this->view->render("home", compact("naam"));
    }

    function bla(){
        return "blaHome";
    }

}