@extends('layouts.app')


@section('body')


    @if(!empty($data))

    <h2>Welkom {{$data[0]->Firstname}}</h2>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="/account">Mijn account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/account/naw">NAW-Gegevens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/account/orders">Mijn Orders</a>
        </li>
        @if($data[0]->Role == "ADMINISTRATOR")
        <li class="nav-item">
            <a class="nav-link" href="/adminpanel">Admin paneel</a>
        </li>
        @endif
    </ul>

    @else 

        Er is iets fout gegaan, probeer opnieuw in te loggen. Als het probleem zich blijft voordoen neem dan contact met ons op.

    @endif

@endsection

