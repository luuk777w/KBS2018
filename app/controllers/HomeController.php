<?php

namespace App\Controllers;

use App\Models\Products;
use Core\Controller;

class HomeController extends Controller
{

    /**
     * Laat de homepagina zien
     *
     * @return void
     */
    public function index()
    {

        session_start();
        $productsmodel = new Products();
        $products = $productsmodel->getProducts();

        return $this->view->render("home", compact("products"));
    }

    public function bla()
    {

        return "blaHome";
    }

}
