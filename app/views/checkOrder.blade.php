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

    <rect fill="#107BFD" x="370" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#6B747C" x="530" y="30" rx="10" ry="10" width="150" height="10"/>

    <text fill="#107BFD" font-size="15" font-family="Arial" x="60" y="25">Gegevens invullen</text>
    <text fill="#107BFD" font-size="15" font-family="Arial" x="250" y="25">Bezorging</text>
    <text fill="#107BFD" font-size="15" font-family="Arial" x="398" y="25">Controleren</text>
    <text fill="#6B747C" font-size="15" font-family="Arial" x="580" y="25">Betalen</text>
</svg>
<br>

<div class="row">
    <div class="col">
        <h3>Aflever adres</h3>
        Naam: {{$customer["Firstname"]}} {{$customer["Lastname"]}} <br>
        @if($address["IsPostNLServicePoint"] == 1) <span style="color:#EC8B27">PostNL Service point</span> <br> @endif
        Straat: {{$address["Street"]}} {{$address["HouseNr"]}} <br>
        Postcode: {{$address["PostalCode"]}} <br>
        Stad: {{$address["City"]}}
    </div>
    <div class="col">
        <h3>Producten</h3>
        <table class="table table-bordered">
            <tr>
                <th width="40%">Product naam</th>
                <th width="10%">Aantal</th>
                <th width="20%">Prijs</th>
                <th width="15%">Totaal</th>
            </tr>
            @foreach($orderLines as $orderLine)
                <tr>
                    <td>{{$orderLine->item_name}}</td>
                    <td>{{$orderLine->item_quantity}}</td>
                    <td>€{{$orderLine->item_price}}</td>
                    <td>€{{$orderLine->item_price * $orderLine->item_quantity}}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" align="right">Totaal</td>
                <td align="left"><b>€ {{$total}}</b></td>
            </tr>
        </table>
    </div>

</div>

<div class="row">
    <div class="col"></div>
    <div class="col">      
        <form action="/order/pay" method="post">  
            <input type="submit" class="btn btn-primary" style="float: right" value="Betalen met iDeal">   
        </form>
     </div>
</div>

@endsection


