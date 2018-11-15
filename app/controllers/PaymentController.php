<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\Categories;
use App\Controllers\ErrorController;
use Mollie\Api\MollieApiClient;

class PaymentController extends Controller
{

    public function index(){

        $mollie = new MollieApiClient();
        $mollie->setApiKey("test_RAnWWDeHWDMPhCzeEMvq9FtNyfgwDD");

        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "10.00"
            ],
            "description" => "My first API payment",
            "redirectUrl" => "http://localhost/bedankt/",
            "webhookUrl"  => "https://wide-world-importers.cf/mollie-webhook/",
        ]);

        $auth = new Auth();
        $auth->setOneTimeAuthorization("bedankPage");        

        return header("Location: " . $payment->getCheckoutUrl(), true, 303);
    }

    public function hook()
    {
        try {
            $mollie = new MollieApiClient();
            $mollie->setApiKey("test_RAnWWDeHWDMPhCzeEMvq9FtNyfgwDD");

            $payment = $mollie->payments->get($_POST["id"]);

            if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {

                
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