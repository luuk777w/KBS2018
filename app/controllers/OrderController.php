<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Categories;
use App\Models\Products;

class OrderController extends Controller
{
    public function index(){
        session_start();

        $auth = new Auth();

        if(!isset($_SESSION["naw"]) || !isset($_SESSION["delivery"]) || !isset($_COOKIE["shopping_cart"])) {
            $auth->error401();
        }

        $address;

        if($_SESSION["delivery"]["method"] == "HOME") {
            $address = [
                "CustomerID" => $auth->getId(),
                "IsDeliveryAddress" => 1,
                "IsPostNLServicePoint" => 0,
                "Street" => $_SESSION["naw"]["street"],
                "HouseNr" => $_SESSION["naw"]["huisnummer"],
                "PostalCode" => $_SESSION["naw"]["code"],
                "City" => $_SESSION["naw"]["city"],
                "Country" => "Netherlands"
            ];
        } else {
            $address = [
                "IsDeliveryAddress" => 1,
                "IsPostNLServicePoint" => 1,
                "Street" => $_SESSION["delivery"]["deliveryAddress"][0],
                "HouseNumber" => $_SESSION["delivery"]["deliveryAddress"][1],
                "PostalCode" => $_SESSION["delivery"]["deliveryAddress"][2],
                "City" => $_SESSION["delivery"]["deliveryAddress"][3],
                "Country" => "Netherlands"
            ];
        }

        $customer = [
            "Firstname" => $_SESSION["naw"]["vnaam"],
            "Lastname" => $_SESSION["naw"]["anaam"],
            "Preposition" => $_SESSION["naw"]["tvnaam"],
            "Email" => $_SESSION["naw"]["email"],
            "PhoneNr" => $_SESSION["naw"]["telefoonNr"],
        ];

        $order = [
            "CustomerID" => $auth->getId(),
            "OrderDate" => new \DateTime(),
            "PostNLTT" => "XXX",
        ];

        $orderLines = json_decode(stripslashes($_COOKIE["shopping_cart"]));

        $total = 0;

        $productsModel = new Products();

        foreach ($orderLines as $orderLine) {
            $total += $productsModel->getProductById($orderLine->item_id)[0]->RecommendedRetailPrice * $orderLine->item_quantity;
        }

        if($total < 20) {
            array_push($orderLines, json_decode(json_encode(["item_name" => "verzendkosten", "item_price" => 2.95, "item_id" => NULL, "item_quantity" => 1])));
            $total += 2.95;
        }

        $_SESSION["address"] = $address;
        $_SESSION["customer"] = $customer;
        $_SESSION["order"] = $order;
        $_SESSION["orderLines"] = $orderLines;
        $_SESSION["orderTotal"] = $total;

        return $this->view->render("checkOrder", compact("address", "customer", "order", "orderLines", "total"));

    }

}