<?php

namespace App\Controllers;

use Core\Auth;
use Core\Controller;
use App\Models\Categories;

class DeliveryController extends Controller
{
    public function index(){

        session_start();

        if(!isset($_SESSION["naw"])) {
            $auth = new Auth();
            return $auth->error401();
        }

        $startDate;
        $endDate;

        if(new \DateTime() > new \DateTime("22:00:00")) {
            $startDate = date("d-m-Y", strtotime(' +2 day'));
            $endDate = date("d-m-Y", strtotime(' +9 day'));
        } else {
            $startDate = date("d-m-Y", strtotime(' +1 day'));
            $endDate = date("d-m-Y", strtotime(' +8 day'));
        }

        $datesResponse = $this->apiCall("https://api-sandbox.postnl.nl/shipment/v2_1/calculate/timeframes?AllowSundaySorting=true&StartDate=${startDate}&EndDate=${endDate}&PostalCode=".$_SESSION["naw"]["code"]."&HouseNumber=".$_SESSION["naw"]["huisnummer"]."&CountryCode=NL&Options=Daytime");
        $dates = json_decode($datesResponse)->Timeframes->Timeframe;

        $locationsResponse = $this->apiCall("https://api-sandbox.postnl.nl/shipment/v2_1/locations/nearest?CountryCode=NL&PostalCode=".$_SESSION["naw"]["code"]);
        $locations = json_decode($locationsResponse)->GetLocationsResult->ResponseLocation;

        return $this->view->render("delivery", compact("dates", "locations"));

    }

    public function saveDeliveryPreference() {
        session_start();

        $deliveryDate = filter_input(INPUT_POST, "deliveryDate");
        $explodedDeliveryDate = explode(":", $deliveryDate);

        $method = $explodedDeliveryDate[0];

        if($method == "HOME") {

            $_SESSION["delivery"] = [
                "method" => $explodedDeliveryDate[0],
                "deliveryAddress" => NULL,
                "date" => $explodedDeliveryDate[1]
            ];
            
        } else if($method == "POSTNLSERVICEPOINT") {

            $_SESSION["delivery"] = [
                "method" => $explodedDeliveryDate[0],
                "deliveryAddress" => explode("|+|",$explodedDeliveryDate[1]),
                "date" => NULL
            ];

        }

        return header("Location: /order/check");

    }

    private function apiCall($url) {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "apikey: fbA6GxtRlNjUQclWYltTcc3wabMsyKu6"
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return "cURL Error:" . $error;
        }

        return $response;

    }

}