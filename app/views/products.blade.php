@extends('layouts.app')

@section('head')

    <style>
        
        /* In de Head section kan je allemaal tags plaatsen die daar moeten zoals een style tag, 
        of een linkje naar een style bestand.*/
    
    </style>

@endsection

@section('body')

    <form action="/products" method="post">
        <button class="btn btn-primary">Get All Products</button>
    </form>

    <br>

    @foreach ($products as $product)

    {{$product->StockItemName}} <br>
        
    @endforeach

@endsection