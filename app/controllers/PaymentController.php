<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\Categories;
use Mollie\Api\MollieApiClient;

class PaymentController extends Controller
{
    private $mollie;

    function __construct()
    {
        $this->mollie = new MollieApiClient();
        $this->mollie->setApiKey("test_RAnWWDeHWDMPhCzeEMvq9FtNyfgwDD");

    }

    public function index(){

        $payment = $this->mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00"
            ],
            "description" => "My first API payment",
            "redirectUrl" => "https://wide-world-importers.cf/bedankt/",
            "webhookUrl"  => "https://wide-world-importers.cf/mollie-webhook/",
        ]);

        return header("Location: " . $payment->getCheckoutUrl(), true, 303);
    }

    public function hook()
    {
        try {
            $payment = $this->mollie->payments->get($_POST["id"]);

            if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
                
                return "ER IS BETAALT WOHOOO!!!!";

            }

        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            return "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

}