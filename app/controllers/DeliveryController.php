<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Categories;

class DeliveryController extends Controller
{
    public function index(){

        return $this->view->render("delivery");

    }

}