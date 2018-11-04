@extends('layouts.app')

@section('head')

    <style>


    </style>

@endsection

@section('body')

    <br>

    <h1>Winkelwagen</h1>

    <div style="clear:both"></div>
    <br />
    <h3>Order Details</h3>
    <div class="table-responsive">
        <div align="right">
            <a href="/shoppingcart/clear"><b>Leeg Winkelmand</b></a>
        </div>
        <table class="table table-bordered">
            <tr>

                <th width="40%">Product naam</th>
                <th width="10%">Aantal</th>
                <th width="20%">Prijs</th>
                <th width="15%">Totaal</th>
                <th width="5%"></th>
            </tr>
@php
            $total = 0;
@endphp
        @foreach($cart_data as $keys => $values)
                <form method="post" action="/shoppingcart/update">
                    <tr>
                        <input type=hidden value="{{$values["item_id"]}}" name="hidden_id">
                        <input type=hidden value="{{$values["item_price"]}}" name="hidden_price">
                        <input type=hidden value="{{$values["item_quantity"]}}" name="quantity">
                        <input type=hidden value="{{$values["item_name"]}}" name="hidden_name">

                        <td>{{$values["item_name"]}}</td>
                        <td><input type="number" name="quantity" value="{{$values["item_quantity"]}}" ><input class="btn btn-primary" type=submit name="update" value="bijwerken"></td>
                        <td>€ {{$values["item_price"]}}</td>
                        <td>€ {{number_format($values["item_quantity"] * $values["item_price"], 2)}}</td>
                        <td><a href="/shoppingcart/delete/{{$values["item_id"]}}"><span class="text-danger">Verwijder</span></a></td>
                    </tr>
                </form>
                @php
                    $total += ($values["item_quantity"] * $values["item_price"]);
                @endphp

            @endforeach

            @if(isset($values))



            @else

                @php
                    $total = 0;
                @endphp

                <tr>
                    <td colspan="5" align="center">Geen producten in winkelwagen.</td>
                </tr>

            @endif



            <tr>
                <td colspan="3" align="right">Totaal</td>
                <td align="left">€ {{number_format($total, 2)}}</td>
                <td></td>
            </tr>

        </table>




@endsection