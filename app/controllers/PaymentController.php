<?php

namespace App\Controllers;

use App\Models\Orders;
use Core\Auth;
use Core\Controller;
use Mollie\Api\MollieApiClient;
use App\Models\Account;

class PaymentController extends Controller
{

    public function index()
    {

        session_start();

        if (!isset($_SESSION["orderTotal"])) {
            return "Winkelwagen leeg";
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

                //TODO: Check of de bestelling wel daadwerkelijk is gelukt

                session_start();

                $account = new Account();
                $account->addCustomer($_SESSION["customer"]["Firstname"], $_SESSION["customer"]["Lastname"], $_SESSION["customer"]["Preposition"], $_SESSION["customer"]["Email"], $_SESSION["customer"]["PhoneNr"]);
        

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
