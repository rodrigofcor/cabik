@extends('layouts.app')

@section('title', 'Criar Conta')

@section('content')

<div class="col-md-3 mx-auto p-4">
    <div class="row">
        <h1>Login</h1>
    </div>

    @include('includes.alertError')  

    <form action="{{ route("authenticate") }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">  
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" value="{{ old('password') }}">
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#modalTermsOfUse">Logar!</button>
        </div>
    </form>
</div>

@endsection