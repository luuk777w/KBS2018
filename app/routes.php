<?php

namespace App;

Class Routes
{

    /**
     * Routes zijn op de volgende manier te maken:
     * 'The route' => ['GET', The Controller', 'The Method']
     * Je kan een variable in de route zetten door het
     * tussen { } te doen.
     * Voorbeeld:
     * 'products/{productId}/view' => ['GET, 'The Controller', 'The Method']
     * Je kan niet beginnen of eindigen met een /
     */
    public static $routes = [
        'GET:' => ['HomeController', 'index'],
        'GET:home' => ['HomeController', 'index'],
        'GET:login' => ['LoginController', 'index'],
        'GET:products' => ['ProductController', 'index'],
        'POST:products' => ['ProductController', 'getProducts']
    ];

}