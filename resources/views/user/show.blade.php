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

                <div class="row">
                    <span><strong>Cidade:</strong> {{ $user->localization }}</span>
                </div>

                @if ($user->show_pix == 1 && $user->full_pix)
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
                                <button type="button" class="btn btn-outline-secondary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalPetSeeMore"
                                    data-bs-title="{{ $pet->title }}"
                                    data-bs-name="{{ $pet->name }}"
                                    data-bs-specie="{{ $pet->specie->name }}"
                                    data-bs-breed="{{ $pet->breed->name }}"
                                    data-bs-sex="{{ $pet->sex->name }}"
                                    data-bs-age="{{ $pet->age->name }}"
                                    data-bs-size="{{ $pet->size->name }}"
                                    data-bs-special="{{ $pet->specialStatus }}"
                                    data-bs-castration="{{ $pet->castration->name }}"
                                    data-bs-objective="{{ $pet->objective->name }}"
                                    data-bs-localization="{{ $pet->localization }}"
                                    data-bs-description="{!! nl2br( $pet->description) !!}"
                                    data-bs-srcs="{{ $pet->allPhotosSrc }}"
                                    data-bs-tutor="{{ $pet->user->name }}"
                                    data-bs-tutorUrl=""
                                >Ver mais</button>

                                @if (!Auth::check() || Auth::user()->id != $user->id)
                                    <button href="#" class="btn btn-success"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalContact"
                                        data-bs-photo="{{ $pet->mainPhotoSrc }}"
                                        data-bs-title="{{ $pet->title }}"
                                        data-bs-tutorPhoto="{{ $pet->user->avatar_src }}"
                                        data-bs-tutor="{{ $pet->user->name }}"
                                        data-bs-petId="{{ $pet->id }}"

                                        @if (Auth::check())
                                            data-bs-userName="{{ Auth::user()->name }}"
                                            data-bs-userPhone="{{ Auth::user()->full_phone }}"
                                            danameta-bs-userEmail="{{ Auth::user()->email }}"
                                        @else
                                            data-bs-userName=""
                                            data-bs-userPhone=""
                                            data-bs-userEmail=""
                                        @endif
                                    >Contato</button>

                                    @if (($pet->objective->id == 'F' || $pet->objective->id == 'A') && ($user->show_pix == 1 && $user->full_pix))
                                        <button href="#" class="btn btn-primary"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalShowPix"
                                            data-bs-pix="{{ $pet->user->full_pix }}"
                                        >Pix</button>
                                    @endif
                                @else
                                    <a href="{{ route('pet.edit', $pet) }}" class="btn btn-primary">Editar</a>
                                    {{-- <a href="#" class="btn btn-danger">Deletar</a> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('includes.modalPetSeeMore')
@include('includes.modalContact')  
@include('includes.modalShowPix')  

@endsection