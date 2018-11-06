<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Products;

class ProductsCategoriesController extends Controller
{
    public function index($StockGroupID){
				
        $products = new Products();
        $products = $products->getProductsbyCategory($StockGroupID);
				
        return $this->view->render("productscategory", compact("products"));
    }
	

}