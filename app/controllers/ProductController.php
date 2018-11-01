<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        return $this->view->render("products");
    }

    public function getProducts(){
        $products = new Products();
        $products = $products->getProducts();

        return $this->view->render("products", compact("products"));
    }

    public function productPageIndex($productId, $productName)
    {
        $product = new Products();
        $product = $product->getProductById($productId);

        if($productName !== str_replace(' ', '-', $product->StockItemName)) 
        {
            return header("Location: /product/${productId}/". str_replace(' ', '-', $product->StockItemName));
        }

        // $blob;
        // if($product->Photo == NULL) 
        // {
        //     $blob = base64_encode($this->setImageFromAPI($product->StockItemName));
        // }

        return $this->view->render("product", compact("product"));
    }

    public function redirectToCorrectURL($productId)
    {
        $product = new Products();
        $product = $product->getProductById($productId);

        return header("Location: /product/${productId}/". str_replace(' ', '-', $product->StockItemName));
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