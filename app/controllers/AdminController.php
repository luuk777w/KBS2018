<?php

namespace App\Controllers;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Products;
use Core\Auth;
use Core\Controller;

class AdminController extends Controller
{

    public function index()
    {
        $auth = new Auth();
        if (!$auth->isLoggedIn()) {
            return $auth->error401();
        }

        $account = new Account();

        $data = $account->getAccount($auth->getId());

        if ($data[0]->Role == "ADMINISTRATOR") {

            $productsmodel = new Products();
            $products = $productsmodel->getRecommendedProducts();
            $carouselItems = $productsmodel->getCarouselProducts();

            return $this->view->render("adminpanel", compact("data", "products", "carouselItems"));
        } else {
            $auth->error403();
        }
    }

    public function spotlight($action, $productId)
    {
        if (!isset($productId) && !isset($action)) {
            return header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $auth = new Auth();
        if (!$auth->isLoggedIn()) {
            return $auth->error401();
        }

        $account = new Account();

        $data = $account->getAccount($auth->getId());

        if ($data[0]->Role != "ADMINISTRATOR") {
            return $auth->error403();
        }

        $admin = new Admin();

        switch ($action) {
            case 'addRecommendedProduct':
                if ($admin->getRecommendedProductById($productId)[0] == null) {
                    $admin->addRecommendedProductById($productId);
                }
                break;

            case 'addCarouselProduct':
                if ($admin->getCarouselProductById($productId)[0] == null) {
                    $admin->addCarouselProductById($productId);
                }
                break;

            case 'removeRecommendedProduct':
                if ($admin->getRecommendedProductById($productId)[0] != null) {
                    $admin->removeRecommendedProductById($productId);
                }
                break;

            case 'removeCarouselProduct':
                if ($admin->getCarouselProductById($productId)[0] != null) {
                    $admin->removeCarouselProductById($productId);
                }
                break;

            case 'xxxx':
                # code...
                break;

            default:
                # code...
                break;
        }

        return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
