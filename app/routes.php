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
        'GET:categories' => ['CategoryController', 'index'],

    ];

}