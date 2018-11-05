<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Products;

class ShoppingCartController extends Controller
{
    private $message;

    public function index()
    {
        if(isset($_COOKIE["shopping_cart"]))
        {
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = [];
        }

        return $this->view->render("shoppingCart", compact("cart_data"));
    }

    public function addToCart()
    {
        if(isset($_COOKIE["shopping_cart"]))
        {
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);

            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');

        if(in_array($_POST["hidden_id"], $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
                {
                    $cart_data[$keys]["item_quantity"] = $_POST["quantity"];
                }
            }
        }
        else
        {
            $item_array = array(
                'item_id'			=>	$_POST["hidden_id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
                'item_quantity'		=>	$_POST["quantity"],
            );
            $cart_data[] = $item_array;
        }

        $item_data = json_encode($cart_data);
        setcookie('shopping_cart', $item_data, time() + (86400 * 30), '/');

        return "Success";
    }

    public function update()
    {
        if(isset($_COOKIE["shopping_cart"]))
        {
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);

            $cart_data = json_decode($cookie_data, true);
        }
        else
        {
            $cart_data = array();
        }

        if($_POST["quantity"] < 1)
        {
            return header("location:/shoppingcart");
        }

        $item_id_list = array_column($cart_data, 'item_id');

        if(in_array($_POST["hidden_id"], $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {
                if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
                {
                    $cart_data[$keys]["item_quantity"] = $_POST["quantity"];
                }
            }
        }
        else
        {
            $item_array = array(
                'item_id'			=>	$_POST["hidden_id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
                'item_quantity'		=>	$_POST["quantity"]
            );

            $cart_data[] = $item_array;
        }

        $item_data = json_encode($cart_data);
        setcookie('shopping_cart', $item_data, time() + (86400 * 30), '/');
        return header("location:/shoppingcart");
    }

    public function test()
    {
        $_POST["hidden_id"] = 1;
        $_POST["hidden_name"] = "Test";
        $_POST["hidden_price"] = 5;
        $_POST["quantity"] = 3;
        $this->addToCart();
        return "Test";
    }

    public function removeFromCart($id)
    {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);

        foreach($cart_data as $keys => $values)
        {
            if($cart_data[$keys]['item_id'] == $id)
            {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data,time() + (86400 * 30), '/');
            }
        }

        return header("location:/shoppingcart");
    }

    public function clearCart()
    {
        setcookie("shopping_cart", "", time() - 3600, '/');
        return header("Location: /shoppingcart");
    }


}