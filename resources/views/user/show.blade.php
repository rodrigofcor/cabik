@extends('layouts.app')

@section('title', "{$user->name} ({$user->login})")

@section('content')

<div class="container-xxl p-4">
    <div class="row">
        <img class="profile-photo-show" src="{{ $user->avatar }}"/>
        <div class="w-auto">
            <div class="mt-0">
                <h2>{{ $user->name }}</h2>
                <h5>{{ $user->login }}</h5>
                @if (Auth::user() == $user)
                    <a href="{{ route('user.edit', $user) }}" type="button" class="btn btn-primary btn-sm mt-1">Editar perfil</a>
                @endif
            </div>

            <div class="mt-2">
                @if ($user->show_email == 1)
                    <div class="row">
                        <span><strong>E-mail:</strong> {{ $user->email }}</span>
                    </div>
                @endif

                @if ($user->show_phone == 1)
                    <div class="row">
                        <span><strong>Celular:</strong> {{ $user->full_phone }}</span>
                    </div>
                @endif

                @if ($user->show_localization == 1)
                    <div class="row">
                        <span><strong>Cidade:</strong> {{ $user->localization }}</span>
                    </div>
                @endif

                @if ($user->show_pix == 1)
                    <div class="row">
                        <span><strong>Pix:</strong> {{ $user->full_pix }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <hr>
</div>

@endsection