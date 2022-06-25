@extends('layouts.app')

@section('title', 'Pesquisar Pet')

@section('content')

@include('includes.modalPetSeeMore')
@include('includes.modalContact')  

<div id="app">
    <search-pet 
        :ddds="{{ $ddds }}"
        :species="{{ $species }}"
        :ages="{{ $ages }}"
        :sizes="{{ $sizes }}"
    />
</div>

@endsection