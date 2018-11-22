@extends('layouts.app')


@section('body')

    @if(!empty($data))

    <h2>Welkom {{$data[0]->Firstname}}</h2>

    @else 

        Er is iets fout gegaan, probeer opnieuw in te loggen. Als het probleem zich blijft voordoen neem dan contact met ons op.

    @endif

@endsection

