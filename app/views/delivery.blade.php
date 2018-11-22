@extends('layouts.app')

@section('head')


@endsection

@section('body')

<br>

<h1>Bestellen</h1>
<hr>

<svg width="740" height="60" style="display: block; margin: auto">
    <rect fill="#107BFD" x="50" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#107BFD" x="210" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#6B747C" x="370" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#6B747C" x="530" y="30" rx="10" ry="10" width="150" height="10"/>

    <text fill="#107BFD" font-size="15" font-family="Arial" x="60" y="25">Gegevens invullen</text>
    <text fill="#107BFD" font-size="15" font-family="Arial" x="250" y="25">Bezorging</text>
    <text fill="#6B747C" font-size="15" font-family="Arial" x="398" y="25">Controleren</text>
    <text fill="#6B747C" font-size="15" font-family="Arial" x="580" y="25">Betalen</text>
</svg>
<br>

<form action="/order/delivery" method="post">

<div class="row">
    <div class="col">

        <h4>Bezorgen:</h4>
        Laat uw pakket door PostNL bezorgen wanneer het u uitkomt! Kosten zijn: <br> €2.95 als uw bestelling onder de €20,00- is, daarboven is het gratis!.<br>

<br>
    @foreach($dates as $date)

            <div class="form-check">
                <input class="form-check-input" type="radio" name="deliveryDate" value="HOME:{{$date->Date}}" @if($date->Date == $dates[0]->Date) checked @endif>
                <label class="form-check-label" for="exampleRadios1">
                <b>{{$date->Date}}</b>
                Tussen <b>{{$date->Timeframes->TimeframeTimeFrame->From}}</b> en <b>{{$date->Timeframes->TimeframeTimeFrame->To}}</b>
                </label>
            </div>

        @endforeach

    </div>
    <div class="col">
        <h4>Ophalen:</h4>
        Haal uw pakket op bij een PostNL service punt wanneer het u uitkomt! Kosten zijn: <br>€2.95 als uw bestelling onder de €20,00- is, daarboven is het gratis!<br>
        <br>
        @foreach($locations as $location)

        <div class="form-check">
        <input class="form-check-input" type="radio" name="deliveryDate" value="POSTNLSERVICEPOINT:{{$location->Address->Street}}|+|{{$location->Address->HouseNr}}|+|{{$location->Address->Zipcode}}|+|{{$location->Address->City}}">
            <label class="form-check-label" for="exampleRadios1">
            {{$location->Name}} - {{$location->Address->Street}} {{$location->Address->HouseNr}}, {{$location->Address->City}}</label>
        </div>

        @endforeach
    </div>
</div>

<br><br>

<div class="row">
    <div class="col">
    </div>

    <div class="col">
        <input type="submit" class="btn btn-primary" style="float: right" value="Verder">
    </div>
</div>

</form>
    
@endsection