@extends('layouts.app')

@section('title', 'Bem-vindo!')

@section('content')

<div class="container-xxl p-4">
    <div class="row">
        <h1>Bem-vindo!</h1>
    </div>
    <div class="row"> 
        <div class="col-md-8">
            <img src="{{ asset('images/welcome-speech.svg') }}" style="width: 90%" alt="Bem-vindo!">
        </div>

        <div class="col-md-4 align-self-center">
            <div class="row">
                <button type="button" class="btn btn-primary btn-lg mt-4">Pesquisar</button>
            </div>
            <div class="row">
                <button type="button" class="btn btn-secondary btn-lg mt-4">Login</button>
            </div>
            <div class="row">
                <a href="{{ route("user.create") }}" type="button" class="btn btn-success btn-lg mt-4">Criar Conta</a>
            </div>
        </div>
    </div>
</div>

@endsection