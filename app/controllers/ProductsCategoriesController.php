<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Products;
use App\Models\Categories;

class ProductsCategoriesController extends Controller
{
    public function index($StockGroupID){
				
        $products = new Products();
        $categories = new Categories();
        $products = $products->getProductsbyCategory($StockGroupID);
        $media = $categories->GetCategoryMedia();
				
        return $this->view->render("products", compact("products"));
    }
	

}