@extends('layouts.app')

@section('body')

    <body id="LoginForm">
    <div class="container col-5">
        <h1 class="form-heading">Inloggen</h1>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <p>Vul hier uw gebruikersnaam en wachtwoord in</p>
                </div>

                @if(isset($msg))
                    {{$msg}}
                @endif

                <form id="Login" method="post" action="/login">

                    <div class="form-group">

                        Gebruikersnaam
                        <input type="text" class="form-control" name="username" placeholder="Gebuikersnaam">

                    </div>

                    <div class="form-group">

                        Wachtwoord
                        <input type="password" class="form-control" name="password" placeholder="Wachtwoord">

                    </div>
                    <div class="forgot">
                        <a href="reset.html">Wachtwoord vergeten?</a>
                    </div>
                    <button type="submit" style="float: right" class="btn btn-primary">Login</button>

                </form>

            </div>
        </div>
    </div>
    </body>
@endsection

