<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Categories;

class CategoryController extends Controller
{

    public function index(){
        $categories = new Categories();
        $categories = $categories->getCategories();

        return $this->view->render("categories", compact("categories"));

    }




}