<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\Categories;
use Mollie\Api\MollieApiClient;
use App\Models\Products;

class PaymentController extends Controller
{

    public function index(){

        if(!isset($_COOKIE["shopping_cart"])) {
            return "Winkelwagen leeg";
        }

        $mollie = new MollieApiClient();
        $mollie->setApiKey("test_RAnWWDeHWDMPhCzeEMvq9FtNyfgwDD");

        $product = new Products();
        $totalAmount = 0;

        $shopping_cart = stripslashes($_COOKIE["shopping_cart"]);
        $cart_data = json_decode($shopping_cart, true);

        foreach ($cart_data as $item) {
            $totalAmount += $product->getProductById($item["item_id"])[0]->UnitPrice * $item["item_quantity"];
        }

        $formattedTotal = number_format(round($totalAmount, 2), 2);

        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $formattedTotal
            ],
            "description" => "Bestelling bij de WWI",
            "redirectUrl" => "https://wide-world-importers.cf/bedankt",
            "webhookUrl"  => "https://wide-world-importers.cf/mollie-webhook/",
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

        if(!$auth->isAuthorized()) 
        {
            return $auth->error401();
        }

        return $this->view->render("bedankt");
    }

}