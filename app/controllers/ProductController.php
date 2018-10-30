<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    function index(){
        return $this->view->render("products");
    }

    function getProducts(){
        $products = new Products();
        $products = $products->getProducts();

        return $this->view->render("products", compact("products"));
    }

}