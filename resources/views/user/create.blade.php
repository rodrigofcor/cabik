@extends('layouts.app')

@section('title', 'Criar Conta')

@section('content')

<div class="container-xxl p-4">
  <div class="row">
    <h1>Criar Conta</h1>
  </div>

  @include('includes.alertError')  
  
  <form action="{{ route("user.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
      <div class="profile-photo-upload">
        <label for="profile_photo" style="width: 100%">
          <figure><img id="profile-photo-preview" style="display: block; margin-left: auto;margin-right: auto;" src="{{ asset('images/profile-photo-ico.png') }}" alt="Foto de perfil"/></figure>
        </label>

        <input type="file" id="profile_photo" name="profile_photo" accept="image/*">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-3">
        <div class="form-group">
          <label for="name">Nome <span class="ast">*</span></label>
          <input type="text" class="form-control title-case" id="name" name="name" placeholder="João Bonito" value="{{ old('name') }}">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="id">Login <span class="ast">*</span></label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">@</div>
            </div>
            <input type="text" class="form-control lower-case" id="id" name="id" placeholder="joao_bonito" value="{{ old('id') }}">
            <small id="idHelp" class="form-text text-muted">Escolha bem, você não poderá alterá-lo.</small>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="email">E-mail <span class="ast">*</span></label>
          <input type="text" class="form-control lower-case" id="email" name="email" placeholder="joaobonito@email.com" value="{{ old('email') }}">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="show_email" name="show_email" value="on" {{ old('show_email') == 'on' ? 'checked' : '' }}>
            <label class="form-check-label" for="show_email">Exibir no meu perfil</label>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="phone">Celular</label>
          <input type="text" class="form-control phone" id="phone" name="phone" placeholder="99999-9999" value="{{ old('phone') }}">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="show_phone" name="show_phone" value="on" {{ old('show_phone') == 'on' ? 'checked' : '' }}>
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
                {!! Form::select('ddd_id', $ddds, old('ddd_id'), ['id' => 'ddd_id','class' => 'form-control','placeholder' => 'Qual seu DDD?']) !!}
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
                <input type="checkbox" class="form-check-input" id="show_localization" name="show_localization" value="on" {{ old('show_localization') == 'on' ? 'checked' : '' }}>
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
                {!! Form::select('pix_type_id', $pixTypes, old('pix_type_id'), ['id' => 'pix_type_id','class' => 'form-control','placeholder' => 'Qual tipo?']) !!}
              </div>
            </div>  
    
            <div class="col-md-6">
              <div class="form-group">
                <label for="pix">Chave</label>
                <input type="text" class="form-control lower-case" id="pix" name="pix" placeholder="xxxxx..."  value="{{ old('pix') }}">
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="show_pix" name="show_pix" value="on" {{ old('show_pix') == 'on' ? 'checked' : '' }}>
                <label class="form-check-label" for="show_pix">Exibir no meu perfil e publicações</label>
                <small id="PixTypeHelp" class="form-text text-muted float-end">Por segurança evite CPF ou CNPJ.</small>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-3"></div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="password">Senha <span class="ast">*</span></label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="password_confirmation">Confirmar Senha <span class="ast">*</span></label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
      </div>
      <div class="col-md-3"></div>
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

  let defaultSrc = "{{ asset('images/profile-photo-ico.png') }}"
  let oldCityId = "{{ old('city_id') }}"

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