<?php


namespace App\Controllers;

use Core\Auth;
use Core\Controller;

class PostalController
{

 function PostalCheck($code, $num){

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
         return ("cURL Error #:" . $err);
     } else {
         var_dump(json_decode($response)->_embedded->addresses[0]);

     }
 }


}