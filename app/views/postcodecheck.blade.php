@extends('layouts.app')

@section('head')

    <style>




    </style>

    @endsection


@section('body')




    <h5>Een voortgangsbalkie hier</h5>
    <h2 class="text-center">Uw gegevens</h2>


@if (!empty($_POST["send"]))

    @php
$code = filter_input(INPUT_POST, "code");
$vnaam = filter_input(INPUT_POST, "vnaam");
$anaam = filter_input(INPUT_POST, "anaam");
$tvnaam = filter_input(INPUT_POST, "tvnaam");
$email = filter_input(INPUT_POST, "email");


$num = filter_input(INPUT_POST, "num");

if($msg == "Het adres lijkt te bestaan!"){

print('<div class="alert alert-success" role="alert">'.$msg.'</div>');


}else{

print('<div class="alert alert-danger" role="alert">'.$msg.'</div>');

}
print($msg.'<br>');

@endphp
<form method="post" action="/postcodecheck/check">
    Voornaam: <input type="text" name="vnaam" required value="{{$vnaam}}"><br>
    Tussenvoegsels: <input type="text" name='tvnaam'  value="{{$tvnaam}}"><br>
    Achternaam: <input type="text" name="anaam" required value="{{$anaam}}"><br>
    Postcode: <input type="text" name="code" required value="{{$code}}">
    Huisnummer: <input type="number" name="num" required value="{{$num}}"><br>
    Emailadres: <input type="text" name='email' required value="{{$email}}"><br>

    <input type="submit" name="send" class="btn btn-primary" value="Postcode Check">
    <br>

</form>

    <h3>Uw ingevulde gegevens</h3>
<table>
    <tr><td>Voornaam</td><td>{{$data['vnaam']}}</td></tr>
    <tr><td>Tussenvoegsels</td><td>{{$data['tvnaam']}}</td></tr>
    <tr><td>Achternaam</td><td>{{$data['anaam']}}</td></tr>
    <tr><td>Straat</td><td>{{$data['street']}}</td></tr>
    <tr><td>Huisnummer</td><td>{{$data['huisnummer']}}</td></tr>
    <tr><td>Postcode</td><td>{{$data['code']}}</td></tr>
    <tr><td>Provincie</td><td>{{$data['province']}}</td></tr>
    <tr><td>Stad</td><td>{{$data['city']}}</td></tr>

</table>

    <a href="#" class="btn btn-primary">Bezorgmoment kiezen</a>



@else




<form method="post" action="/postcodecheck/check">
    Voornaam: <input type="text" name="vnaam" required value=""><br>
    Tussenvoegsels: <input type="text" name='tvnaam'  value=""><br>
    Achternaam: <input type="text" name="anaam" required value=""><br>
    Postcode: <input type="text" name="code" required value="">
    Huisnummer: <input type="text" name="num" required value=""><br>
    Emailadres: <input type="text" name='email' required value=""><br>
    <input type="submit" name="send" class="btn btn-primary" value="Verzenden">
    <br>

</form>

@endif


@endsection