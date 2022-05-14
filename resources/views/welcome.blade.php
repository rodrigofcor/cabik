@extends('layouts.app')

@section('title', 'Bem-vindo!')

@section('content')

<div class="container-xxl p-4">
    <div class="row">
        <div class="col-md-4">    
            <h1>Bem-vindo!</h1>

            <div style="margin-top: 100%">
                <div class="row">
                    <button type="button" class="btn btn-primary mt-4">Pesquisar</button>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-secondary mt-4">Login</button>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-success mt-4">Criar Conta</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <img src="{{ asset('images/welcome-speech.svg') }}" style="heigth: 100%" alt="Bem-vindo!">
        </div>
    </div>
</div>

@endsection