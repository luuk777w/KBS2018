<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Core\Controller;
use App\Models\Account;
use Core\Auth;

class ProductController extends Controller
{
    /**
     * Producten index
     * De pagina waar alle producten worden weergeven
     *
     * @return void
     */
    public function index()
    {
        //Initialiseer het product en categorie model
        $productsmodel = new Products();
        $categoriesmodel = new Categories();

        //Zoeken op een searchterm wanneer de GET waarde q bestaat, anders alle producten tonen
        if (isset($_GET['q'])) {
            //Krijg alle producten die "q" in de naam hebben staan
            $products = $productsmodel->getProductBySearchTerm($_GET['q']);
            $searchTerm = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
        } else {
            //Krijg alle producten
            $products = $productsmodel->getProducts();
        }

        //Krijg de alle categorienamen
        $categories = $categoriesmodel->getCategorynames();

        $isAdmin = false;

        $auth = new Auth();
        if($auth->isLoggedIn()){
            $account = new Account();
            $userdata = $account->getAccount($auth->getId());

            if($userdata[0]->Role == "ADMINISTRATOR") {
                $isAdmin = true;
            }
        }

        //Render de products view en geef de products, categories en de searchTerm mee
        return $this->view->render("products", compact("products", "categories", "searchTerm", "isAdmin"));
    }

    /**
     * Producten per categorie
     * Laat alle producten per categorie zien
     *
     * @param [id] $StockGroupID
     * @return void
     */
    public function ViewProductsByCategory($StockGroupID)
    {

        //Initialiseer het product, categorie model
        $productModel = new Products();
        $categoriesModel = new Categories();

        //Krijg alle producten bij Categorie ID
        $products = $productModel->getProductsbyCategoryId($StockGroupID);

        //Krijg alle categorieen
        $categories = $categoriesModel->getCategorynames();

        $isAdmin = false;

        $auth = new Auth();
        if($auth->isLoggedIn()){
            $account = new Account();
            $userdata = $account->getAccount($auth->getId());

            if($userdata[0]->Role == "ADMINISTRATOR") {
                $isAdmin = true;
            }
        }

        //Render de view en geef de producten en categorieen mee
        return $this->view->render("products", compact("products", "categories", "isAdmin"));
    }
 public function orderby()
    {
        //Initialiseer het product en categorie model
        $productsmodel = new Products();
        $categoriesmodel = new Categories();
        $send = filter_input(INPUT_POST, "sorteren");
        if($send){
            $minprijs = filter_input(INPUT_POST, "minprijs");
            $maxprijs = filter_input(INPUT_POST, "maxprijs");
            $products = $productsmodel->minmaxprijs($minprijs, $maxprijs);
        } else {
            //Krijg alle producten
            $order = filter_input(INPUT_POST, "orderby");
            $products = $productsmodel->$order();
        }

        //Krijg de alle categorienamen
        $categories = $categoriesmodel->getCategorynames();

        $isAdmin = false;

        $auth = new Auth();
        if($auth->isLoggedIn()){
            $account = new Account();
            $userdata = $account->getAccount($auth->getId());

            if($userdata[0]->Role == "ADMINISTRATOR") {
                $isAdmin = true;
            }
        }

        //Render de products view en geef de products, categories en de searchTerm mee
        return $this->view->render("products", compact("products", "categories", "searchTerm", "isAdmin"));
    }

}