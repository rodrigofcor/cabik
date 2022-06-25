@extends('layouts.app')

@section('title', 'Editar Pet')

@section('content')

<div class="container-xxl p-4">
    <div class="row">
        <h1>Editar Pet</h1>
    </div>

  @include('includes.alertError')  

    <form action="{{ route("pet.update", $pet) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mt-2">
            <div class="col-md-4">
                <div id="carrouselInputPetPhotos" class="carousel slide carousel-dark slide" data-bs-ride="carousel" data-bs-interval="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carrouselInputPetPhotos" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carrouselInputPetPhotos" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carrouselInputPetPhotos" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carrouselInputPetPhotos" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="pet-photo-upload text-center">
                            <label for="pet_photo_1">
                              <figure><img id="preview_pet_photo_1" src="{{ $pet->mainPhotoSrc }}" alt="Preview"/></figure>
                            </label>
                    
                            <input type="file" class="pet_photo" id="pet_photo_1" name="pet_photo_0" accept="image/*" src="{{ $pet->mainPhotoSrc }}">
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="pet-photo-upload text-center">
                            <label for="pet_photo_2">
                                <figure><img id="preview_pet_photo_2" src="{{ $pet->photos->where('order', 1)->first()->photoSrc }}" alt="Preview"/></figure>
                            </label>
                      
                            <input type="file" class="pet_photo" id="pet_photo_2" name="pet_photo_1" accept="image/*">
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="pet-photo-upload text-center">
                            <label for="pet_photo_3">
                                @if ($pet->photos->where('order', 2)->first())
                                    <figure><img id="preview_pet_photo_3" src="{{ $pet->photos->where('order', 2)->first()->photoSrc }}" alt="Preview"/></figure>
                                @else
                                    <figure><img id="preview_pet_photo_3" src="{{ asset('images/pet-photo-ico.png') }}" alt="Preview"/></figure>
                                @endif
                            </label>
                      
                            <input type="file" class="pet_photo" id="pet_photo_3" name="pet_photo_2" accept="image/*">
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="pet-photo-upload text-center">
                            <label for="pet_photo_4">
                                @if ($pet->photos->where('order', 3)->first())
                                    <figure><img id="preview_pet_photo_4" src="{{ $pet->photos->where('order', 3)->first()->photoSrc }}" alt="Preview"/></figure>
                                @else
                                    <figure><img id="preview_pet_photo_4" src="{{ asset('images/pet-photo-ico.png') }}" alt="Preview"/></figure>
                                @endif
                            </label>
                      
                            <input type="file" class="pet_photo" id="pet_photo_4" name="pet_photo_3" accept="image/*">
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carrouselInputPetPhotos" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carrouselInputPetPhotos" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label for="name">Nome</span></label>
                        <input type="text" class="form-control title-case" id="name" name="name" placeholder="Rex" value="{{ old('name', $pet->name) }}">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group">
                        <label for="specie_id">Espécie <span class="ast">*</span></label>
                        {!! Form::select('specie_id', $species, old('specie_id', $pet->specie->id), ['id' => 'specie_id', 'class' => 'form-control','placeholder' => 'Qual a espécie?']) !!}
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group">
                        <label for="breed_id">Raça <span class="ast">*</span></label>
                        <select class="form-control" id="breed_id" name="breed_id">
                            <option value="">Qual a raça?</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mt-2">
                    <div class="form-group">
                        <label for="age_id">Idade <span class="ast">*</span></label>
                        <div class="radio mt-2">
                            <label class="radio-inline"><input type="radio" name="age_id" value="F" {{ old('age_id', $pet->age_id) == 'F' ? 'checked' : '' }}>&nbsp;Filhote</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="age_id" value="J" {{ old('age_id', $pet->age_id) == 'J' ? 'checked' : '' }}>&nbsp;Jovem</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="age_id" value="A" {{ old('age_id', $pet->age_id) == 'A' ? 'checked' : '' }}>&nbsp;Adulto</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="age_id" value="I" {{ old('age_id', $pet->age_id) == 'I' ? 'checked' : '' }}>&nbsp;Idoso</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="form-group">
                        <label for="size_id">Tamanho <span class="ast">*</span></label>
                        <div class="radio mt-2">
                            <label class="radio-inline"><input type="radio" name="size_id" value="P" {{ old('size_id', $pet->size_id) == 'P' ? 'checked' : '' }}>&nbsp;Pequeno</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="size_id" value="M" {{ old('size_id', $pet->size_id) == 'M' ? 'checked' : '' }}>&nbsp;Médio</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="size_id" value="G" {{ old('size_id', $pet->size_id) == 'G' ? 'checked' : '' }}>&nbsp;Grande</label>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="form-group">
                        <label for="special">Cuidados Especiais <span class="ast">*</span></label>
                        <div class="radio mt-2">
                            <label class="radio-inline"><input type="radio" name="special" value="0" {{ old('special', $pet->special) == '0' ? 'checked' : '' }}>&nbsp;Não necessita</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="special" value="1" {{ old('special', $pet->special) == '1' ? 'checked' : '' }}>&nbsp;Necessita</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="form-group">
                        <label for="sex_id">Sexo <span class="ast">*</span></label>
                        <div class="radio mt-2">
                            <label class="radio-inline"><input type="radio" name="sex_id" value="M" {{ old('sex_id', $pet->sex_id) == 'M' ? 'checked' : '' }}>&nbsp;Macho</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="sex_id" value="F" {{ old('sex_id', $pet->sex_id) == 'F' ? 'checked' : '' }}>&nbsp;Fêmea</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="sex_id" value="I" {{ old('sex_id', $pet->sex_id) == 'I' ? 'checked' : '' }}>&nbsp;Não tenho certeza</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="form-group">
                        <label for="castration_id">Castrado <span class="ast">*</span></label>
                        <div class="radio mt-2">
                            <label class="radio-inline"><input type="radio" name="castration_id" value="S" {{ old('castration_id', $pet->castration_id) == 'S' ? 'checked' : '' }}>&nbsp;Sim</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="castration_id" value="N" {{ old('castration_id', $pet->castration_id) == 'N' ? 'checked' : '' }}>&nbsp;Não</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="castration_id" value="I" {{ old('castration_id', $pet->castration_id) == 'I' ? 'checked' : '' }}>&nbsp;Não tenho certeza</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="form-group">
                        <label for="objective_id">Objetivo <span class="ast">*</span></label>
                        <div class="radio mt-2">
                            <label class="radio-inline"><input type="radio" name="objective_id" value="D" {{ old('objective_id', $pet->objective_id) == 'D' ? 'checked' : '' }}>&nbsp;Doar</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="objective_id" value="F" {{ old('objective_id', $pet->objective_id) == 'F' ? 'checked' : '' }}>&nbsp;Ajuda Financeira</label>
                            &nbsp;
                            <label class="radio-inline"><input type="radio" name="objective_id" value="A" {{ old('objective_id', $pet->objective_id) == 'A' ? 'checked' : '' }}>&nbsp;Ambos</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mt-2">
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" id="description" name="description" style="resize:none" rows="10" maxlength="500" placeholder="Coloração, tipo de pelo, comportamento, alimentação, sobre o motivo do cadastro... Se necessitar de cuidados especiais, explique sobre.">{{ old('description', $pet->description) }}</textarea>
                    </div>
                </div>
              
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#modalAlertCreatePet">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/helpers.js') }}"></script>
<script>
$(document).ready(function () { 

    let defaultSrc = "{{ asset('images/pet-photo-ico.png') }}"
    let oldBreedId = {{ old('oldBreedId', $pet->breed_id) }}

    fetchBreedId()

    $('.pet_photo').change(function () {
        let inputId = '#preview_' + $(this).attr('id')
  
        let file = this.files[0]
        if (file) {
            let reader = new FileReader()
            reader.onload = function(event) {
                $(inputId).attr('src', event.target.result)
            }
            reader.readAsDataURL(file)
        } else {
            $(inputId).attr('src', defaultSrc)
        }
    })

    $("#specie_id").change(function () {
        fetchBreedId()
    })

    function fetchBreedId () {
        $("#breed_id").html('<option value="">Qual a raça?</option>')
        
        if ($("#specie_id").val()) {
            $.ajax({
                type: "GET",
                url: "{{ url('/api/specie') }}" + "/" + $("#specie_id").val() + "/breed",
                timeout: 5000,
                data: {
                    // "var": var,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $.each(data, function() {
                        $("#breed_id").append($("<option />").val(this.id).text(this.name))

                        if(this.id == oldBreedId) {
                            $("#breed_id option[value=" + oldBreedId + "]").prop("selected", true)
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

})
</script>

@endpush