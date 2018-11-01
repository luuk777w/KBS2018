<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        return $this->view->render("products");
    }

    public function getProducts(){
        $products = new Products();
        $products = $products->getProducts();

        return $this->view->render("products", compact("products"));
    }

    public function productPageIndex($productId, $productName)
    {

        return $this->view->render("product", compact("productName"));
    }

}