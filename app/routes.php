<?php

namespace App;

class Routes
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
        'GET:product/{productId}' => ['ProductDetailsController', 'redirectToCorrectURL'],
        'GET:product/{productId}/{productName}' => ['ProductDetailsController', 'index'],
        'POST:product/addtocart/{productId}' => ['ProductDetailsController', 'addToCart'],
        'GET:shoppingcart' => ['ShoppingCartController', 'index'],
        'GET:shoppingcart/test' => ['ShoppingCartController', 'test'],
        'POST:shoppingcart/add' => ['ShoppingCartController', 'addToCart'],
        'GET:shoppingcart/delete/{id}' => ['ShoppingCartController', 'removeFromCart'],
        'GET:shoppingcart/clear' => ['ShoppingCartController', 'clearCart'],
        'POST:shoppingcart/update' => ['ShoppingCartController', 'update'],
        'GET:categories' => ['CategoryController', 'index'],
        'GET:categories/{StockGroupID}' => ['ProductController', 'ViewProductsByCategory'],
        'GET:order/naw' => ['PostalController', 'index'],
        'POST:order/naw' => ['PostalController', 'PostalCheck'],
        'GET:order/delivery' => ['DeliveryController', 'index'],
        'POST:order/delivery' => ['DeliveryController', 'saveDeliveryPreference'],
        'GET:order/check' => ['OrderController', 'index'],
        'POST:order/pay' => ['PaymentController', 'index'],
        'POST:mollie-webhook' => ['PaymentController', 'hook'],
        'GET:bedankt' => ['PaymentController', 'bedankPage'],
        'POST:login' => ['LoginController', 'check'],
        'GET:logout' => ['LoginController', 'logout'],
        'POST:products' => ['ProductController', 'orderby'],
        'GET:account' => ['AccountController', 'index'],
        'GET:register' => ['RegisterController', 'index'],
        'POST:register' => ['RegisterController', 'register'],
        'GET:account/naw' => ['AccountController', 'naw'],
        'POST:account/naw' => ['AccountController', 'checkNAW'],
        'POST:account/naw-update' => ['AccountController', 'updateNAW'],
        'GET:temp' => ['TempController', 'updateTemp'],
        'GET:account/orders' => ['AccountController', 'showorders'],
        'GET:adminpanel' => ['AdminController', 'index'],
        'POST:admin/spotlight/{action}/{id}' => ['AdminController', 'spotlight'],
    ];
}
