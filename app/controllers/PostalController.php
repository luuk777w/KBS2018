<?php


namespace App\Controllers;

use Core\Auth;
use Core\Controller;

class PostalController extends Controller

{

    function index(){
        return $this->view->render("postcodecheck");
    }

 function PostalCheck()
 {
     $vnaam = filter_input(INPUT_POST,"vnaam");
     $anaam = filter_input(INPUT_POST,"anaam");
     $tvnaam = filter_input(INPUT_POST,"tvnaam");
     $code = filter_input(INPUT_POST,"code");
     $num = filter_input(INPUT_POST, "num");
     $send = filter_input(INPUT_POST,"send");

     if ($send != NULL) {

         $curl = curl_init();

         curl_setopt_array($curl, array(
             CURLOPT_URL => "https://api.postcodeapi.nu/v2/addresses/?postcode=$code&number=$num",
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_ENCODING => "",
             CURLOPT_MAXREDIRS => 10,
             CURLOPT_TIMEOUT => 30,
             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "GET",
             CURLOPT_HTTPHEADER => array(
                 "accept: application/hal+json",
                 "x-api-key: 70krf7hu8X2mR77IaFZBl6y1VvRoHl5G8BID0eHG"
             ),
         ));

         $response = curl_exec($curl);
         $err = curl_error($curl);

         curl_close($curl);

         if ($err) {
             $msg = "cURL Error #:" . $err;

             return $this->view->render("postcodecheck", compact("msg"));

             //check of er address gegevens zijn, als deze er niet zijn doe dan dit
         } elseif(json_decode($response)->_embedded->addresses[0]=='') {

             //Geef het volgede bericht door aan de view
             $msg = "Het adres lijkt niet te bestaan, check uw gegevens en probeer het nog eens";

             //roep de view aan
             return $this->view->render("postcodecheck", compact("msg"));

         }else{
             $msg = "Het adres lijkt te bestaan!";

                     $data = array();
             array_push($data,'vnaam', $vnaam);
             array_push($data,'anaam', $anaam);
             array_push($data,'tvnaam', $tvnaam);
             array_push($data,'street', json_decode($response)->_embedded->addresses[0]->street);
             array_push($data,'province', json_decode($response)->_embedded->addresses[0]->province->lable);
             array_push($data,'city', json_decode($response)->_embedded->addresses[0]->city->lable);


             return $this->view->render("postcodecheck", compact("msg", 'data'));

         }
     } else {

         return "Error geen input geleverd";

     }


 }



}


