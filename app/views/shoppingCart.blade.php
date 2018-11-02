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
            <a href="/shoppingcart/clear"><b>Clear Cart</b></a>
        </div>
        <table class="table table-bordered">
            <tr>

                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>

            @foreach($cart_data as $keys => $values)
                <form method="post" action="/shoppingcart/update">
                    <tr>
                        <input type=hidden value="{{$values["item_id"]}}" name="hidden_id">
                        <input type=hidden value="{{$values["item_price"]}}" name="hidden_price">
                        <input type=hidden value="{{$values["item_quantity"]}}" name="quantity">
                        <input type=hidden value="{{$values["item_name"]}}" name="hidden_name">

                        <td>{{$values["item_name"]}}</td>
                        <td><input type="number" name="quantity" value="{{$values["item_quantity"]}}" >
                            <input type=submit name="update"></td>
                        <td>$ {{$values["item_price"]}}</td>
                        <td>$ {{number_format($values["item_quantity"] * $values["item_price"], 2)}}</td>
                        <td><a href="/shoppingcart/delete/{{$values["item_id"]}}"><span class="text-danger">Remove</span></a></td>
                    </tr>
                </form>
            @endforeach

            @if(isset($values))

                @php
                    $total = 0;
                    $total += ($values["item_quantity"] * $values["item_price"]);
                @endphp

            @else

                @php
                    $total = 0;
                @endphp

                <tr>
                    <td colspan="5" align="center">Geen producten in winkelwagen.</td>
                </tr>

            @endif



            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$ {{number_format($total, 2)}}</td>
                <td></td>
            </tr>

        </table>




@endsection