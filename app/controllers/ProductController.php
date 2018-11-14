<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Media;

class ProductController extends Controller
{

    public function index()
    {
        $productsmodel = new Products();
        $categoriesmodel = new Categories();

        if(isset($_GET['q'])) {
            $products = $productsmodel->getProductBySearchTerm($_GET['q']);
        } else {
            $products = $productsmodel->getProducts();
        }

        $categories = $categoriesmodel->getCategorynames();

        return $this->view->render("products", compact("products", "categories"));
    }

    public function productPageIndex($productId, $productName)
    {
        $product = new Products();
        $categoriesmodel = new Categories();
        $media = new Media();

        $productDetails = $product->getProductById($productId);
        $media = $media->getProductMediaById($productId);
        $categories = $categoriesmodel->getCategorynames();

        if($productName !== str_replace('?', '', str_replace(' ', '-', $productDetails[0]->StockItemName)))
        {
            return header("Location: /product/${productId}/". str_replace(' ', '-', $productDetails[0]->StockItemName));
        }

        return $this->view->render("product", compact("productDetails", "media", "categories"));
    }

    public function redirectToCorrectURL($productId)
    {
        $product = new Products();
        $product = $product->getProductById($productId);

        return header("Location: /product/${productId}/". str_replace('?', '', str_replace(' ', '-', $product[0]->StockItemName)));
    }

    public function addToCart($productId)
    {
        $product = new Products();
        $shoppingCartController = new ShoppingCartController();
        $product = $product->getProductById($productId);

        $_POST["hidden_id"] = $product->StockItemID;
        $_POST["hidden_name"] = $product->StockItemName;
        $_POST["hidden_price"] = $product->UnitPrice;
        $_POST["quantity"] = 1;

        $shoppingCartController->addToCart();

        return header("location:/product/".$product->StockItemID);
    }
}