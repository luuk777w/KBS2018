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

        $dates = [];

        if(date("w", strtotime(' +1 day')) != 0) {
            array_push($dates, "Morgen, ".date("d-m-Y", strtotime(' +1 day')));
        } else {
            array_push($dates, $this->getDayName(date("w", strtotime(' +2 day'))).", ".date("d-m-Y", strtotime(' +2 day')));
        }

        if(date("w", strtotime(' +2 day')) != 0) {
            array_push($dates, $this->getDayName(date("w", strtotime(' +2 day'))).", ".date("d-m-Y", strtotime(' +2 day')));
        } else {
            array_push($dates, $this->getDayName(date("w", strtotime(' +3 day'))).", ".date("d-m-Y", strtotime(' +3 day')));
        }

        if(date("w", strtotime(' +3 day')) != 0) {
            array_push($dates, $this->getDayName(date("w", strtotime(' +3 day'))).", ".date("d-m-Y", strtotime(' +3 day')));
        } else {
            array_push($dates, $this->getDayName(date("w", strtotime(' +4 day'))).", ".date("d-m-Y", strtotime(' +4 day')));
        }

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api-sandbox.postnl.nl/shipment/v2_1/locations/nearest?CountryCode=NL&PostalCode=".$_SESSION["naw"]["code"],
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

        $locations = json_decode($response)->GetLocationsResult->ResponseLocation;

        return $this->view->render("delivery", compact("dates", "locations"));

    }

    private function getDayName($dayNr) {

        switch ($dayNr) {
            case 0:
                return "Zondag";
                break;
            case 1:
                return "Maandag";
                break;
            case 2:
                return "Dinsdag";
                break;
            case 3:
                return "Woensdag";
                break;
            case 4:
                return "Donderdag";
                break;
            case 5:
                return "Vrijdag";
                break;
            case 6:
                return "Zaterdag";
                break;
            
            default:
                # code...
                break;
        }

    }

}