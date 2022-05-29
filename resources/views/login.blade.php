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

        <div class="row mt-2">  
            <div class="form-group">
                <input type="text" class="form-control" id="login" name="login" placeholder="E-mail ou login" value="{{ old('login') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" value="{{ old('password') }}">
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#modalTermsOfUse">Logar!</button>
        </div>
    </form>
</div>

@endsection