<?php


namespace App\Controllers;

use Core\Auth;
use Core\Controller;

class PostalController extends Controller
{

    public function index(){
        return $this->view->render("postcodecheck");
    }


 function PostalCheck()
 {
     $vnaam = filter_input(INPUT_POST, "vnaam");
     $anaam = filter_input(INPUT_POST, "anaam");
     $tvnaam = filter_input(INPUT_POST, "tvnaam");
     $code = filter_input(INPUT_POST, "code");
     $num = filter_input(INPUT_POST, "num");
     $send = filter_input(INPUT_POST, "send");
     $email = filter_input(INPUT_POST, "email");

     if ($num == 0) {
         //Geef het volgede bericht door aan de view
         $msg = "Het huisnummer kan geen 0 zijn, check uw gegevens en probeer het nog eens";

         //roep de view aan
         return $this->view->render("postcodecheck", compact("msg"));
     } else {
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

                 //check of er address gegevens zijn, als deze er niet zijn doe dan dit
             } elseif (json_decode($response)->_embedded->addresses[0] == '') {

                 //Geef het volgede bericht door aan de view
                 $msg = "Het adres lijkt niet te bestaan, check uw gegevens en probeer het nog eens";

                 //roep de view aan
                 return $this->view->render("postcodecheck", compact("msg"));

             } else {
                 $msg = "Het adres lijkt te bestaan!";

                 $data = array();
                 $data['vnaam'] = $vnaam;
                 $data['tvnaam'] = $tvnaam;
                 $data['anaam'] = $anaam;
                 $data['email'] = $email;
                 $data['code'] = $code;
                 $data['street'] = json_decode($response)->_embedded->addresses[0]->street;
                 $data['huisnummer'] = $num;
                 $data['province'] = json_decode($response)->_embedded->addresses[0]->province->label;
                 $data['city'] = json_decode($response)->_embedded->addresses[0]->city->label;

                 session_start();

                 $_SESSION['naw']=$data;

                 return $this->view->render("postcodecheck", compact("msg", 'data', 'response'));

             }
         } else {

             return "Error geen input geleverd";

         }

     }
 }


}


