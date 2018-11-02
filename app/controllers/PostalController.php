<?php


namespace App\Controllers;

use Core\Auth;
use Core\Controller;

class PostalControllerontroller
{

 function PostalCheck($code, $num){

$client = new http\Client;
$request = new http\Client\Request;

$request->setRequestUrl('https://api.postcodeapi.nu/v2/addresses/');
$request->setRequestMethod('GET');
$request->setQuery(new http\QueryString(array(
    'postcode' => $code,
    'number' => $num
)));

$request->setHeaders(array(
    'accept' => 'application/hal+json',
    'x-api-key' => 'a0B1c2D34D5c6b7a8'
));

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();
 }


}