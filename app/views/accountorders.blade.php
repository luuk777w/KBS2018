@extends('layouts.app')


@section('body')


    @if(!empty($userdata))

    <h2>Welkom {{$userdata[0]->Firstname}}</h2>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="/account">Mijn account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/account/naw">NAW-Gegevens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/account/orders">Mijn Orders</a>
        </li>
    </ul>

    <div style="clear:both"></div>
    <br />

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>

                <th width="40%">Product naam</th>
                <th width="10%">Aantal</th>
                <th width="20%">Prijs</th>
                <th width="5%">Datum</th>
                <th width="15%">Totaal</th>
            </tr>
            @php
                $total = 0;
            @endphp
            @foreach($allorders as $values)
                    <tr>


                        <td>{{$values->StockItemName}}</td>
                        <td>{{$values->Quantity}}</td>
                        <td>€ {{$values->RecommendedRetailPrice}}</td>
                        <td>{{$values->OrderDate}}</td>
                        <td>€ {{$values->Price}}</td>

                    </tr>


            @endforeach

            @if(isset($values))

            @else
                @php
                    $total = 0;
                @endphp
                <tr>
                    <td colspan="5" align="center">Geen orders gevonden.</td>
                </tr>
            @endif


        </table>
    </div>



    @else 

        Er is iets fout gegaan, probeer opnieuw in te loggen. Als het probleem zich blijft voordoen neem dan contact met ons op.

    @endif

@endsection

