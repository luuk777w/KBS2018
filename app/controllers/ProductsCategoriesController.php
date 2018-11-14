<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Media;

class ProductsCategoriesController extends Controller
{
    public function index($StockGroupID){
				
        $products = new Products();
        $categories = new Categories();
        $media = new Media();
        $products = $products->getProductsbyCategoryId($StockGroupID);
        $categories = $categories->getCategorynames();
        $media = $media->GetCategoryMedia();
				
        return $this->view->render("products", compact("products", "categories", "media"));
    }
	

}