<div class="modal fade" id="modalPetSeeMore" tabindex="-1" aria-labelledby="modalPetSeeMoreLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fas fa-dog" style="color: #0D6EFD"></i>&nbsp;&nbsp;<h5 class="modal-title" id="modalPetSeeMoreLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div id="carrouselShowPetPhotos" class="carousel slide carousel-dark slide" data-bs-ride="carousel" data-bs-interval="false">
              <div id="carrousel-modal-pet-indicators" class="carousel-indicators"></div>
              <div id="carrousel-modal-pet-show" class="carousel-inner"></div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carrouselShowPetPhotos" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carrouselShowPetPhotos" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-md-6">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Espécie:</strong> <span class="modal-specie"></span></li>
              <li class="list-group-item"><strong>Raça:</strong> <span class="modal-breed"></span></li>
              <li class="list-group-item"><strong>Sexo:</strong> <span class="modal-sex"></span></li>
              <li class="list-group-item"><strong>Idade:</strong> <span class="modal-age"></span></li>
              <li class="list-group-item"><strong>Tamanho:</strong> <span class="modal-size"></span></li>
              <li class="list-group-item"><strong>Cuidados Especiais:</strong> <span class="modal-special"></span></li>
              <li class="list-group-item"><strong>Castrado:</strong> <span class="modal-castration"></span></li>
              <li class="list-group-item"><strong>Objetivo:</strong> <span class="modal-objective"></span></li>
              <li class="list-group-item"><strong>Cidade:</strong> <span class="modal-localization"></span></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="modal-hr"><hr></div>
          <div class="modal-description"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Continuar</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(e) {

  var modalPetSeeMore = document.getElementById('modalPetSeeMore')

  modalPetSeeMore.addEventListener('show.bs.modal', function (event) {
    var modalButton = event.relatedTarget

    var modalTitle = modalPetSeeMore.querySelector('.modal-title')
    var modalSpecie = modalPetSeeMore.querySelector('.modal-specie')
    var modalBreed = modalPetSeeMore.querySelector('.modal-breed')
    var modalSex= modalPetSeeMore.querySelector('.modal-sex')
    var modalAge= modalPetSeeMore.querySelector('.modal-age')
    var modalSize = modalPetSeeMore.querySelector('.modal-size')
    var modalSpecial = modalPetSeeMore.querySelector('.modal-special')
    var modalCastration = modalPetSeeMore.querySelector('.modal-castration')
    var modalObjective = modalPetSeeMore.querySelector('.modal-objective')
    var modalDescription = modalPetSeeMore.querySelector('.modal-description')
    var modalLocalization = modalPetSeeMore.querySelector('.modal-localization')
    var modalHr = modalPetSeeMore.querySelector('.modal-hr')

    var title = modalButton.getAttribute('data-bs-title')
    var specie = modalButton.getAttribute('data-bs-specie')
    var breed = modalButton.getAttribute('data-bs-breed')
    var sex = modalButton.getAttribute('data-bs-sex')
    var age = modalButton.getAttribute('data-bs-age')
    var size = modalButton.getAttribute('data-bs-size')
    var special = modalButton.getAttribute('data-bs-special')
    var castration = modalButton.getAttribute('data-bs-castration')
    var objective = modalButton.getAttribute('data-bs-objective')
    var localization = modalButton.getAttribute('data-bs-localization')
    var description = modalButton.getAttribute('data-bs-description')
    var srcs = JSON.parse(modalButton.getAttribute('data-bs-srcs'))

    $('#carrousel-modal-pet-indicators').html('')
    $('#carrousel-modal-pet-show').html('')

    $.each(srcs, function(index, item) {
      if (index == 0) {
        $('#carrousel-modal-pet-indicators').append('<button type="button" data-bs-target="#carrouselShowPetPhotos" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>')
        $('#carrousel-modal-pet-show').append('<div class="carousel-item active"><div class="pet-show-photo-modal text-center"><figure><img class="pet-show-photo-modal" src="' + item + '" alt="Foto do pet"/></figure></div></div>');
      } else {
        $('#carrousel-modal-pet-indicators').append('<button type="button" data-bs-target="#carrouselShowPetPhotos" data-bs-slide-to="' + index + '" aria-label="Slide' + (index + 1) + '"></button>')
        $('#carrousel-modal-pet-show').append('<div class="carousel-item"><div class="pet-show-photo-modal text-center"><figure><img class="pet-show-photo-modal" src="' + item + '" alt="Foto do pet"/></figure></div></div>');
      }
    })

    modalTitle.textContent = title
    modalSpecie.textContent = specie
    modalBreed.textContent = breed
    modalSex.textContent = sex
    modalAge.textContent = age
    modalSize.textContent = size
    modalSpecial.textContent = special
    modalCastration.textContent = castration
    modalObjective.textContent = objective
    modalLocalization.textContent = localization
    modalDescription.innerHTML = description

    if (description) {
      modalHr.innerHTML = '<hr>'
    } else {
      modalHr.innerHTML = ''
    }
  })

})
</script>
@endpush
