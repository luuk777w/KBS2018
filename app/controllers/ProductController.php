<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    function index(){
        $products = new Products();
        $products = $products->getProducts();

        return $this->view->render("products", compact("products"));

    }

}