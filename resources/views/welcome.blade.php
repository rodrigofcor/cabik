@extends('layouts.app')

@section('title', 'Cabik')

@section('content')

<div class="container-xxl p-4">
  <h1>Bem-vindo!</h1>

  <div class="row mt-4">
    <div class="col-md-6">
      <div class="welcome-image text-center"><img src="{{ asset('images/welcome-speech.svg') }}" alt="Bem-vindo!"/></div>
    </div>
    <div class="col-md-4 align-self-center">
      <div class="row text-right mt-4">
        <a href="{{ route('pet.search') }}" type="button" class="btn btn-primary btn-lg">Pesquisar</a>
      </div>
      <div class="row text-center mt-4">
        <a href="{{ route('login') }}" type="button" class="btn btn-secondary btn-lg">Login</a>
      </div>
      <div class="row text-center mt-4">
        <a href="{{ route('user.create') }}" type="button" class="btn btn-success btn-lg">Criar Conta</a>
      </div>
    </div>
  </div>
</div>

@endsection
