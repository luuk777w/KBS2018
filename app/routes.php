<?php

namespace App;

Class Routes
{

    /**
     * Routes zijn op de volgende manier te maken:
     * 'The route' => ['The Controller', 'The Method']
     * Je kan een variable in de route zetten door het
     * tussen { } te doen.
     * Voorbeeld:
     * 'products/{productId}/view' => ['The Controller', 'The Method']
     * Je kan niet beginnen of eindigen met een /
     */
    public static $routes = [
        '/' => ['HomeController', 'index'],
        'home' => ['HomeController', 'index'],
        'login' => ['LoginController', 'index'],
    ];

}