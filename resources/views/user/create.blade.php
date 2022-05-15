@extends('layouts.app')

@section('title', 'Criar Conta')

@section('content')

<div class="container-xxl p-4">
  <div class="row">
    <h1>Criar Conta</h1>
  </div>

  <form>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="name">Nome <span class="ast">*</span></label>
          <input type="text" class="form-control" id="name" placeholder="João Bonito" required>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="id">Login <span class="ast">*</span></label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">@</div>
            </div>
            <input type="email" class="form-control" id="id" placeholder="joao_bonito" required>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="email">Email <span class="ast">*</span></label>
          <input type="email" class="form-control" id="email" placeholder="joaobonito@email.com" required>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-4">
        <div class="form-group">
          <label for="ddd">DDD <span class="ast">*</span></label>
          <select class="form-control" id="ddd" required>
            <option disabled>DDD para localização</option>
          </select>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="phone">Celular</label>
          <input type="text" class="form-control" id="phone" placeholder="99999-9999">
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Tipo de conta <span class="ast">*</span></label>
          <select class="form-control" id="ddd" required>
            <option disabled>O que é você?</option>
          </select>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
      <button type="submit" class="btn btn-success btn-lg">Criar!</button>
    </div>
  </form>
</div>

@endsection