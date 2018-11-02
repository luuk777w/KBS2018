<?php

namespace App;

Class Routes
{

    /**
     * Routes zijn op de volgende manier te maken:
     * 'GET:The route' => [The Controller', 'The Method']
     * Je kan een variable in de route zetten door het
     * tussen { } te doen.
     * Voorbeeld:
     * 'POST:products/{productId}/view' => ['The Controller', 'The Method']
     * Je kan niet beginnen of eindigen met een /
     */
    public static $routes = [
        'GET:' => ['HomeController', 'index'],
        'GET:home' => ['HomeController', 'index'],
        'GET:login' => ['LoginController', 'index'],
        'GET:products' => ['ProductController', 'index'],
        'GET:product/{productId}' => ['ProductController', 'redirectToCorrectURL'],
        'GET:product/{productId}/{productName}' => ['ProductController', 'productPageIndex'],
<<<<<<< HEAD
        'GET:shoppingcart' => ['ShoppingCartController', 'index'],
        'POST:shoppingcart' => ['ShoppingCartController', 'addToCart'],
        'DELETE:shoppingcart/{id}' => ['ShoppingCartController', 'addToCart'],
        'DELETE:shoppingcart' => ['ShoppingCartController', 'removeFromCart'],
=======
        'GET:categories' => ['CategoryController', 'index'],

>>>>>>> 9b97f3e1796d65d73cca7b37b44ed7f9f2fd490e
    ];

}