@extends('layouts.app')

@section('title', 'Pesquisar Pet')

@section('content')

@include('includes.modalPetSeeMore')
@include('includes.modalContact')  
@include('includes.modalShowPix')  

<div id="app">
    <search-pet 
        :ddds="{{ $ddds }}"
        :species="{{ $species }}"
        :ages="{{ $ages }}"
        :sizes="{{ $sizes }}"

        @if (Auth::check())
            user_id="{{ Auth::user()->id }}"
            user_name="{{ Auth::user()->name }}"
            user_phone="{{ Auth::user()->full_phone }}"
            user_email="{{ Auth::user()->email }}"
        @endif
    />
</div>

@endsection