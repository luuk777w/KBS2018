<?php

namespace App\Controllers;

use App\Models\Products;
use Core\Controller;
use Core\Auth;
use App\Models\Account;

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
        $products = $productsmodel->getRecommendedProducts();
        $carouselItems = $productsmodel->getCarouselProducts();

        $isAdmin = false;

        $auth = new Auth();
        if($auth->isLoggedIn()){
            $account = new Account();
            $userdata = $account->getAccount($auth->getId());

            if($userdata[0]->Role == "ADMINISTRATOR") {
                $isAdmin = true;
            }
        }

        return $this->view->render("home", compact("products", "carouselItems", "isAdmin"));
    }



}
