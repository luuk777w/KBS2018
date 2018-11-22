<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Products;

class HomeController extends Controller
{

    /**
     * Laat de homepagina zien
     *
     * @return void
     */
    function index(){

        session_start();
        $productsmodel = new Products();
        $products = $productsmodel->getProducts();

        return $this->view->render("home", compact("products"));
    }

    function bla(){
        return "blaHome";
    }

}