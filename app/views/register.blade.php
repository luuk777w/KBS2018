@extends('layouts.app')

@section('head')

    <style>

        .red{
            color: red;
            display: inline;
        }


    </style>

@endsection


@section('body')

    @php
        if(isset($msg)){
        if($msg == "Het adres lijkt te bestaan!"){

    print("<div class='alert alert-success' role='alert'>'.$msg.'</div>'");



        }
        }
    @endphp

    @if (isset($data["send"]))

        @php


            $vnaam = $data["vnaam"];
            $anaam = $data["anaam"];
            $tvnaam = $data["tvnaam"];
            $email = $data["email"];
            $username = $data["username"];
            $telefoonNr = $data["telefoonNr"];



        print('<div class="alert alert-danger" role="alert">'.$msg.'</div>');




        @endphp

        <div class="row">
            <div class="col-3">
                <div class="col-6">
                    <h2 class="text-center">Uw gegevens</h2>
                    <form method="post" action="/register">
                        <div class="red">*</div>
                        Voornaam: <input class="form-control" type="text" name="vnaam" required value="{{$vnaam}}"><br>
                        Tussenvoegsels: <input class="form-control" type="text" name='tvnaam'  value="{{$tvnaam}}"><br>
                        <div class="red">*</div>
                        Achternaam: <input class="form-control" type="text" name="anaam" required value="{{$anaam}}"><br>
                        <div class="red">*</div>
                        Emailadres: <input class="form-control" type="email" name='email' required value="{{$email}}"><br>
                        <div class="red">*</div>
                        TelefoonNr: <input class="form-control" type="number" minlength="6" name='telefoonNr' required value="{{$telefoonNr}}"><br>
                        <div class="red">*</div>
                        Gebruikersnaam: <input class="form-control" type="text" name='username' required value="{{$username}}" placeholder=""><br>
                        <div class="red">*</div>
                        Wachtwoord: <input class="form-control" type="password" name="ww1" required><br>
                        <div class="red">*</div>
                        Herhaal wachtwoord: <input class="form-control" type="password" name="ww2" required><br>
                        <div class="red">* = Verplicht</div><br>
                        <input type="submit" name="send" class="btn btn-primary" value="Registreren">
                        <br>

                    </form>

                </div>
                <div class="col-3">
                </div>
            </div>
            @else

                <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-6">

                        <h2 class="text-center">Uw gegevens</h2>
                        <form method="post" action="/register">
                            <div class="red">*</div>
                            Voornaam: <input class="form-control" type="text" name="vnaam" required value="" placeholder="Voornaam"><br>
                            Tussenvoegsels: <input class="form-control" type="text" name='tvnaam'  value="" placeholder="Tussenvoegsel"><br>
                            <div class="red">*</div>
                            Achternaam: <input class="form-control" type="text" name="anaam" required value="" placeholder="Achternaam"><br>
                            <div class="red">*</div>
                            Emailadres: <input class="form-control" type="email" name='email' required value="" placeholder="email@gmail.com"><br>
                            <div class="red">*</div>
                            TelefoonNr: <input class="form-control" type="number" minlength="6" name='telefoonNr' required value="" placeholder="0612345678"><br>
                            <div class="red">*</div>
                            Gebruikersnaam: <input class="form-control" type="text" name='username' required value="" placeholder=""><br>
                            <div class="red">*</div>
                            Wachtwoord: <input class="form-control" type="password" name="ww1" required><br>
                            <div class="red">*</div>
                            Herhaal wachtwoord: <input class="form-control" type="password" name="ww2" required><br>
                            <div class="red">* = Verplicht</div><br>
                            <input type="submit" name="send" class="btn btn-primary" value="Registreren">
                            <br>

                        </form>


                    </div>

                </div>
    @endif
@endsection