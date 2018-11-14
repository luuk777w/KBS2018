<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        $productsmodel = new Products();

        if(isset($_GET['q'])) {
            $products = $productsmodel->searchProducts($_GET['q']);
        } else {
            $products = $productsmodel->getProducts();
        }

        $categories = $productsmodel->getCategorynames();

        return $this->view->render("products", compact("products", "categories"));
    }

    public function productPageIndex($productId, $productName)
    {
        $product = new Products();
        $productDetails = $product->getProductById($productId);
        $media = $product->getMediaById($productId);

        if($productName !== str_replace('?', '', str_replace(' ', '-', $productDetails->StockItemName)))
        {
            return header("Location: /product/${productId}/". str_replace(' ', '-', $productDetails->StockItemName));
        }

        // $blob;
        // if($product->Photo == NULL) 
        // {
        //     $blob = base64_encode($this->setImageFromAPI($product->StockItemName));
        // }

        if(!is_array($media)) {
            $media = [$media];
        }

        return $this->view->render("product", compact("productDetails", "media"));
    }

    public function redirectToCorrectURL($productId)
    {
        $product = new Products();
        $product = $product->getProductById($productId);

        return header("Location: /product/${productId}/". str_replace('?', '', str_replace(' ', '-', $product->StockItemName)));
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

    private function setImageFromAPI($term) 
    {
        $url = 'https://api.cognitive.microsoft.com/bing/v7.0/images/search';
        $apiKey = "6a0ac17a7ff64b71961312e3a1a25d63";

        $options = ['http' => [
                        'header' => "Ocp-Apim-Subscription-Key: $apiKey\r\n",
                        'method' => 'GET' ]];
        
        $context = stream_context_create($options);
        $result = json_decode(file_get_contents($url . "?q=" . urlencode($term), false, $context));
        $blob = file_get_contents($result->value[0]->contentUrl);

        return $blob;
    }

}