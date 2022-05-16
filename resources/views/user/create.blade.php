@extends('layouts.app')

@section('title', 'Criar Conta')

@section('content')

<div class="container-xxl p-4">
  <div class="row">
    <h1>Criar Conta</h1>
  </div>

  <form>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="name">Nome <span class="ast">*</span></label>
          <input type="text" class="form-control" id="name" placeholder="João Bonito">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="id">Login <span class="ast">*</span></label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">@</div>
            </div>
            <input type="text" class="form-control" id="id" placeholder="joao_bonito">
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="email">Email <span class="ast">*</span></label>
          <input type="email" class="form-control" id="email" placeholder="joaobonito@email.com">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="phone">Celular</label>
          <input type="text" class="form-control" id="phone" placeholder="99999-9999">
        </div>
      </div>
    </div>
    
    <div class="row mt-3"> 
      <div class="col-md-6">
        <fieldset class="border rounded-3 p-3">
          <legend class="float-none w-auto px-3">Localização</legend>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="ddd_id">DDD <span class="ast">*</span></label>
                <select class="form-control" id="ddd_id">
                  <option disabled>DDD para localização</option>
                  @foreach($ddds as $ddd)
                    <option value="{{ $ddd->id }}">{{ $ddd->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>  
    
            <div class="col-md-6">
              <div class="form-group">
                <label for="city_id">Cidade <span class="ast">*</span></label>
                <select class="form-control" id="city_id">
                  <option disabled>Cidade para localização</option>
                </select>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
      
      <div class="col-md-6">
        <fieldset class="border rounded-3 p-3">
          <legend class="float-none w-auto px-3">Pix</legend>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="pix_type_id">Tipo</label>
                <select class="form-control" id="pix_type_id">
                  <option disabled>Qual tipo?</option>
                </select>
              </div>
            </div>  
    
            <div class="col-md-6">
              <div class="form-group">
                <label for="pix">Chave</label>
                <input type="text" class="form-control" id="pix" placeholder="xxxxx...">
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
      <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#modalTermsOfUse">Criar!</button>
    </div>

    @include('includes.modalTermsOfUse')  
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

  $("#ddd_id").change(function() {
    alert('oi')
    $("#city_id").html("")

    $.ajax({
      url: {{ url('/api/ddd') }} + '/' + $("#ddd_id").val() + '/city', //link da api
      jsonpCallback: "callback",
      dataType: "jsonp",

      success: function(location) {
        $("#city_id").html("dsdsdsdd")
          
      },
      
      // se a requisição tiver algum problema
      error: function(){
          $('#texto').html("Algo deu errado!");
      }
    });
  });
</script>

@endsection