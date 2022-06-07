@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')

<div class="container-xxl p-4">
  <div class="row">
    <h1>Editar Perfil</h1>
  </div>

  @include('includes.alertError')  
  
  <form action="{{ route("user.update", $user) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
      <div class="profile-photo-upload">
        <label for="profile_photo" style="width: 100%">
          <figure><img id="profile-photo-preview" style="display: block; margin-left: auto;margin-right: auto;" src="{{ $user->avatar_src }}" alt="Foto de perfil"/></figure>
        </label>

        <input type="file" id="profile_photo" name="profile_photo" accept="image/*">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-4">
        <div class="form-group">
          <label for="name">Nome <span class="ast">*</span></label>
          <input type="text" class="form-control title-case" id="name" name="name" placeholder="João Bonito" value="{{ old('name', $user->name) }}">
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="email">E-mail <span class="ast">*</span></label>
          <input type="text" class="form-control lower-case" id="email" name="email" placeholder="joaobonito@email.com" value="{{ old('email', $user->email) }}">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="show_email" name="show_email" value="1" {{ old('show_email', $user->show_email) == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="show_email">Exibir no meu perfil</label>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="phone">Celular</label>
          <input type="text" class="form-control phone" id="phone" name="phone" placeholder="99999-9999" value="{{ old('phone', $user->phone) }}">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="show_phone" name="show_phone" value="1" {{ old('show_phone', $user->show_phone) == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="show_phone">Exibir no meu perfil</label>
          </div>
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
                {!! Form::select('ddd_id', $ddds, old('ddd_id', $user->city->ddd_id), ['id' => 'ddd_id','class' => 'form-control','placeholder' => 'Qual seu DDD?']) !!}
              </div>
            </div>  
    
            <div class="col-md-6">
              <div class="form-group">
                <label for="city_id">Cidade <span class="ast">*</span></label>
                <select class="form-control" id="city_id" name="city_id">
                  <option value="">Qual sua cidade?</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="show_localization" name="show_localization" value="1" {{ old('show_localization', $user->show_localization) == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="show_localization">Exibir no meu perfil</label>
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
                {!! Form::select('pix_type_id', $pixTypes, old('pix_type_id', $user->pix_type_id), ['id' => 'pix_type_id','class' => 'form-control','placeholder' => 'Qual tipo?']) !!}
              </div>
            </div>  
    
            <div class="col-md-6">
              <div class="form-group">
                <label for="pix">Chave</label>
                <input type="text" class="form-control lower-case" id="pix" name="pix" placeholder="xxxxx..."  value="{{ old('pix', $user->pix) }}">
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="show_pix" name="show_pix" value="1" {{ old('show_pix', $user->show_pix) == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="show_pix">Exibir no meu perfil</label>
                <small id="PixTypeHelp" class="form-text text-muted float-end">Por segurança evite CPF ou CNPJ.</small>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
      <button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalTermsOfUse">Salvar</button>
    </div>
  </form>
</div>

@endsection

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript" src="{{ asset('js/helpers.js') }}"></script>
<script>
$(document).ready(function () { 

  let defaultSrc = "{{ $user->avatar_src }}"
  let oldCityId = "{{ old('city_id', $user->city_id) }}"

  fetchCityId()

  $('#profile_photo').change(function () {
    const file = this.files[0]
    if (file) {
      let reader = new FileReader()
      reader.onload = function(event) {
        $('#profile-photo-preview').attr('src', event.target.result)
      }
      reader.readAsDataURL(file)
    } else {
      $('#profile-photo-preview').attr('src', defaultSrc)
    }
  })
  
  $("#ddd_id").change(function () {
    fetchCityId()
  })
  
  function fetchCityId () {
    $("#city_id").html('<option value="">Qual sua cidade?</option>')
    
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
            $("#city_id").append($("<option />").val(this.id).text(this.name))

            if(this.id == oldCityId) {
              $("#city_id option[value=" + oldCityId + "]").prop("selected", true)
            }
          })
        },
        error: function (data) {
          console.log("Erro: " + data)
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

  $('.phone').mask('00000-0000')

  $('#pix_type_id').change(function () {
    $('#pix').val('')
    $('#pix').unmask()

    if ($(this).val() == 1) {
      $('#pix').mask('000.000.000-00') // cpf
    } else if($(this).val() == 2) {
      $('#pix').mask('00.000.000/0000-00') // cnpj
    } else if($(this).val() == 4){
      $('#pix').mask('(00) 00000-0000') // phone with ddd
    }
  })

})
</script>

@endpush