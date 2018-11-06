<?php

namespace App\Models;

use Core\Model;

class ProductsCategories extends Model
{
    public function getCategories($StockGroupID){
        $productsCategory = new $productsCategory();
        $productsCategory = $productsCategory->getProductsbyCategory($StockGroupID);

        return $this->view->render("productscategory", compact("productscategory"));
    }



}