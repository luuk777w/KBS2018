<?php

namespace App\Controllers;

use App\Models\Account;
use App\Models\Address;
use App\Models\Orders;
use App\Models\Products;
use Core\Auth;
use Core\Controller;
use Mollie\Api\MollieApiClient;

class PaymentController extends Controller
{

    public function index()
    {

        session_start();

        if (!isset($_SESSION["orderTotal"])) {
            return "Winkelwagen leeg";
        }

        $customer = $_SESSION["customer"];
        $address = $_SESSION["address"];
        $order = $_SESSION["order"];
        $orderLines = $_SESSION["orderLines"];

        $accountModel = new Account();
        $addressModel = new Address();
        $orderModel = new Orders();
        $productsModel = new Products();

        if (empty($accountModel->getCustomerByEmail($customer["Email"])[0])) {

            $accountModel->addCustomer($customer["Firstname"], $customer["Lastname"], $customer["Preposition"], $customer["Email"], $customer["PhoneNr"]);
        }

        $customerID = $accountModel->getCustomerByEmail($customer["Email"])[0]->CustomerID;

        if (empty($addressModel->getAddressByPostalCodeAndHouseNr($address["PostalCode"], $address["HouseNr"])[0])) {

            $addressModel->addAddress($customerID, $address["IsDeliveryAddress"], $address["IsPostNLServicePoint"], $address["Street"],
                $address["HouseNr"], $address["PostalCode"], $address["City"], $address["Country"]);
        }

        $addressID = $addressModel->getAddressByPostalCodeAndHouseNr($address["PostalCode"], $address["HouseNr"])[0]->AddressID;

        $orderModel->removeAllEmptyOrdersByCustomerID($customerID);

        $orderModel->addOrder($customerID, $order["OrderDate"], $addressID, $order["PostNLTT"]);
        $orderID = $orderModel->getEmptyOrderByCustomerID($customerID)[0]->OrderID;

        foreach ($orderLines as $orderline) {

            if ($orderline->item_name == "Verzendkosten") {
                $orderModel->addOrderLine($orderID, null, 1, $orderline->item_price, null);
            } else {

                $product = $productsModel->getProductById($orderline->item_id)[0];
                $orderModel->addOrderLine($orderID, $orderline->item_id, $orderline->item_quantity, $product->RecommendedRetailPrice, $product->TaxRate);
            }
        }

        $mollie = new MollieApiClient();
        $mollie->setApiKey("test_RAnWWDeHWDMPhCzeEMvq9FtNyfgwDD");

        $formattedTotal = number_format(round($_SESSION["orderTotal"], 2), 2);

        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $formattedTotal,
            ],
            "description" => "Bestelling bij de WWI",
            "redirectUrl" => "https://wide-world-importers.cf/bedankt",
            "webhookUrl" => "https://wide-world-importers.cf/mollie-webhook/",
        ]);

        $auth = new Auth();
        $auth->setOneTimeAuthorization("bedankPage");
        setcookie("shopping_cart", "", time() - 3600, '/');

        return header("Location: " . $payment->getCheckoutUrl(), true, 303);
    }

    public function hook()
    {
        try {
            $mollie = new MollieApiClient();
            $mollie->setApiKey("test_RAnWWDeHWDMPhCzeEMvq9FtNyfgwDD");

            $payment = $mollie->payments->get($_POST["id"]);

            if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {



            } elseif ($payment->isOpen()) {
                /*
             * The payment is open.
             */
            } elseif ($payment->isPending()) {
                /*
             * The payment is pending.
             */
            } elseif ($payment->isFailed()) {
                /*
             * The payment has failed.
             */
            } elseif ($payment->isExpired()) {
                /*
             * The payment is expired.
             */
            } elseif ($payment->isCanceled()) {
                /*
             * The payment has been canceled.
             */
            } elseif ($payment->hasRefunds()) {
                /*
             * The payment has been (partially) refunded.
             * The status of the payment is still "paid"
             */
            } elseif ($payment->hasChargebacks()) {
                /*
             * The payment has been (partially) charged back.
             * The status of the payment is still "paid"
             */
            }

        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            return "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

    public function bedankPage()
    {
        $auth = new Auth();

        if (!$auth->isAuthorized()) {
            return $auth->error401();
        }

        return $this->view->render("bedankt");
    }

}
