@extends('layouts.app')

@section('head')
<style>



h1{
    text-align: center;
}

.imageContainer{
    width: 100%;
    height: 20rem;
    background-image: url('/assets/img/receipt-approved.png');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

</style>


@endsection

@section('body')

<br>

<div class="imageContainer">
</div>
<br>

<h1>Bedankt voor uw bestelling bij WWI.</h1>
 

@endsection