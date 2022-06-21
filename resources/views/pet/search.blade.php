@extends('layouts.app')

@section('title', 'Pesquisar Pet')

@section('content')

<div id="app">
    <search-pet 
        :ddds="{{ $ddds }}"
        :species="{{ $species }}"
        :ages="{{ $ages }}"
        :sizes="{{ $sizes }}"
    />
</div>

@endsection