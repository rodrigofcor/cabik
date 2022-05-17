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
          <input type="text" class="form-control title-case" id="name" placeholder="João Bonito">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="id">Login <span class="ast">*</span></label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">@</div>
            </div>
            <input type="text" class="form-control lower-case" id="id" placeholder="joao_bonito">
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="email">Email <span class="ast">*</span></label>
          <input type="email" class="form-control lower-case" id="email" placeholder="joaobonito@email.com">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="phone">Celular</label>
          <input type="text" class="form-control phone" id="phone" placeholder="99999-9999">
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
                <select class="form-control" id="ddd_id" name="ddd_id">
                  <option disabled>Qual seu DDD?</option>
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
                  <option disabled>Qual sua cidade?</option>
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
                  @foreach($pixTypes as $pixType)
                    <option value="{{ $pixType->id }}">{{ $pixType->name }}</option>
                  @endforeach
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

@endsection

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript" src="{{ asset('js/helpers.js') }}"></script>
<script>
$(document).ready(function () { 

  fetchCittyId()

  $("#ddd_id").change(function () {
    fetchCittyId()
  })
  
  function fetchCittyId () {
    $("#city_id").html("<option disabled>Qual sua cidade?</option>")
    
    if($("#ddd_id").val()) {
      $.ajax({
        type: "GET",
        url: "{{ url('/api/ddd') }}" + "/" + $("#ddd_id").val() + "/city",
        timeout: 5000,
        data: {
          // "var": var,
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
          $.each(data, function() {
            $("#city_id").append($("<option />").val(this.id).text(this.name));
          })
        },
        error: function (data) {
          console.log("Erro: " + data);
        }
      })
    }
  }

  $(".title-case").on('change keydown paste input', function ()
  {
    $(this).val(toTitleCase($(this).val()))
  })

  $(".lower-case").on('change keydown paste input', function ()
  {
    $(this).val($(this).val().toLowerCase())
  })

  $('.phone').mask('00000-0000');

})
</script>

@endpush