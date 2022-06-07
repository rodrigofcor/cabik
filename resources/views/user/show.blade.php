@extends('layouts.app')

@section('title', "{$user->name} ({$user->login})")

@section('content')

<div class="container-xxl p-4">
    <div class="row">
        <div class="profile-photo-show"><figure><img src="{{ $user->avatar_src }}" alt="Foto de perfil"/></figure></div>
        <div class="w-auto">
            <div class="mt-3">
                <h2>{{ $user->name }}</h2>
                <div class="row">
                    <h5>
                        {{ $user->login }}
                   
                        @if (Auth::check() && Auth::user()->id == $user->id)
                            <a href="{{ route('user.edit', $user) }}" type="button" class="btn btn-primary btn-sm">Editar perfil</a>
                        @endif
                    </h5>
                </div>
            </div>
            <div class="mt-2">
                @if ($user->show_email == 1)
                    <div class="row">
                        <span><strong>E-mail:</strong> {{ $user->email }}</span>
                    </div>
                @endif

                @if ($user->show_phone == 1 && $user->full_phone)
                    <div class="row">
                        <span><strong>Celular:</strong> {{ $user->full_phone }}</span>
                    </div>
                @endif

                @if ($user->show_localization == 1 && $user->localization)
                    <div class="row">
                        <span><strong>Cidade:</strong> {{ $user->localization }}</span>
                    </div>
                @endif

                @if ($user->show_pix == 1 && $user->full_pix )
                    <div class="row">
                        <span><strong>Pix:</strong> {{ $user->full_pix }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <hr>

    @if (Auth::check() && Auth::user()->id == $user->id)
        <div class="row mt-4 mb-4">
            <div class="d-flex justify-content-center">
                <a href="{{ route('pet.create') }}" type="button" class="btn btn-success btn-lg">Publicar Pet</a>
            </div>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($user->pets as $pet)
    <div class="col">
        <div class="card">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ $pet->mainPhotoSrc }}" class="img-fluid rounded-start" alt="Foto do pet">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $pet->title }}</h5>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Tamanho:</strong> {{ $pet->size->name }}</li>
                    <li class="list-group-item"><strong>Cuidados Especiais:</strong> {{ $pet->specialStatus }}</li>
                    <li class="list-group-item"><strong>Castrado:</strong> {{ $pet->castration->name }}</li>
                    <li class="list-group-item"><strong>Objetivo:</strong> {{ $pet->objective->name }}</li>
                  </ul>
                  
                  <div class="float-end mb-2">
                      <a href="#" class="btn btn-success">Contato</a>
                      <a href="#" class="btn btn-primary">Pix</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    @endforeach
    </div>
</div>

@endsection