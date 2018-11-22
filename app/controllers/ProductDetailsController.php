<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Media;

class ProductDetailsController extends Controller
{
    /**
     * Producten index
     * De pagina waar alle producten worden weergeven
     *
     * @param [int] $productId
     * @param [string] productName
     * @return void
     */
    public function index($productId, $productName)
    {
        //Initialiseer het product, categorie en media model
        $productModel = new Products();
        $categoriesModel = new Categories();
        $mediaModel = new Media();

        //Krijg het product doormiddel van een product Id
        $productDetails = $productModel->getProductById($productId);

        //Krijg de media van het product doormiddel van het product Id
        $media = $mediaModel->getProductMediaById($productId);

        //Krijg alle categorieen.
        $categories = $categoriesModel->getCategorynames();

        //Check of het ID en de naam in de URL overeen komen, zo niet, vervang die dan voor de juiste URL
        if($productName !== str_replace('?', '', str_replace(' ', '-',  str_replace('/', ' ', $productDetails[0]->StockItemName))))
        {
            return header("Location: /product/${productId}/". str_replace(' ', '-', str_replace('/', ' ', $productDetails[0]->StockItemName)));
        }

        //Render de view en geef de ProductDetails, media en categorieen mee
        return $this->view->render("product", compact("productDetails", "media", "categories"));
    }

    /**
     * Redirect naar de juiste URL.
     * Wanneer er alleen maar een ID is mee gegeven voor de detailpagina
     * moet hij geredirect te worden naar de juist URL.
     *
     * @param [int] $productId
     * @return void
     */
    public function redirectToCorrectURL($productId)
    {
        //Initialiseer het productmodel
        $product = new Products();

        //Krijg het product doormiddel van het product ID
        $product = $product->getProductById($productId);

        //Redirect naar de juiste URL
        return header("Location: /product/${productId}/". str_replace('?', '', str_replace(' ', '-', str_replace('/', ' ', $product[0]->StockItemName))));
    }

    /**
     * Voeg product toe aan winkelwagen
     *
     * @param [int] $productId
     * @return void
     */
    public function addToCart($productId)
    {
        //Initialiseer het productmodel en de shoppingCartController
        $product = new Products();
        $shoppingCartController = new ShoppingCartController();

        //Krijg het product doormiddel van het productId
        $product = $product->getProductById($productId);

        //Zet de benodigde POST waarden
        $_POST["hidden_id"] = $product[0]->StockItemID;
        $_POST["hidden_name"] = $product[0]->StockItemName;
        $_POST["hidden_price"] = $product[0]->RecommendedRetailPrice;
        $_POST["quantity"] = 1;

        //Voeg het Item toe aan de winkelwagen
        $shoppingCartController->addToCart();

        //Redirect naar de productDetail pagina
        return header("location:/product/".$product[0]->StockItemID);
    }
}