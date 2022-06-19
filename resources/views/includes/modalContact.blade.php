<div class="modal fade" id="modalContact" tabindex="-1" aria-labelledby="modalContactLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalContactLabel"><i class="fas fa-comments" style="color: #0D6EFD"></i> Contato</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="profile-photo-modal text-center"><figure><img class="modal-photo" src="" alt="Foto do pet"/></figure></div>
            </div>
            <div class="row">
                <h5 class="modal-pet-title text-center"></h5>
            </div>

            <hr>
            <div class="row">
                <small class="form-text text-muted text-center">Entrar em Contato com</small>
            </div>

            <div class="row mt-2">
                <div class="profile-photo-contact-modal text-center"><figure><img class="modal-tutor-photo" src="" alt="Foto do pet"/></figure></div>
            </div>
            <div class="row">
                <h6 class="modal-tutor text-center"></h6> 
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="modal-user-name form-control title-case check" id="name" placeholder="Nome">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="modal-user-phone form-control phone check" id="phone" placeholder="Telefone">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="form-group">
                    <input type="text" class="modal-user-email form-control lower-case check" id="email" placeholder="E-mail">
                </div>
            </div>

            <div class="row mt-4">
                <div class="d-flex justify-content-center">
                    <button type="button" class="modal-button-contact btn btn-success" data-bs-dismiss="modal">Enviar Contato</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript" src="{{ asset('js/helpers.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function(e) {
    var modalContact = document.getElementById('modalContact')

    modalContact.addEventListener('show.bs.modal', function (event) {
        var modalButton = event.relatedTarget

        var modalPhoto = modalContact.querySelector('.modal-photo')
        var modalPetTitle = modalContact.querySelector('.modal-pet-title')
        var modalTutorPhoto = modalContact.querySelector('.modal-tutor-photo')
        var modalTutor = modalContact.querySelector('.modal-tutor')
        var modalUserName = modalContact.querySelector('.modal-user-name')
        var modalUserPhone = modalContact.querySelector('.modal-user-phone')
        var modalUserEmail = modalContact.querySelector('.modal-user-email')

        var photo = modalButton.getAttribute('data-bs-photo')
        var title = modalButton.getAttribute('data-bs-title')
        var tutorPhoto = modalButton.getAttribute('data-bs-tutorPhoto')
        var tutor = modalButton.getAttribute('data-bs-tutor')
        var petId = modalButton.getAttribute('data-bs-petId')
        var userName = modalButton.getAttribute('data-bs-userName')
        var userPhone = modalButton.getAttribute('data-bs-userPhone')
        var userEmail = modalButton.getAttribute('data-bs-userEmail')

        modalPhoto.src = photo
        modalPetTitle.textContent = title
        modalTutor.textContent = tutor
        modalTutorPhoto.src = tutorPhoto
        modalUserName.value = userName 
        modalUserPhone.value = userPhone
        modalUserEmail.value = userEmail

        checkModalContact()

        function checkModalContact () {
            var nameCheck = $('#modalContact #name').val().length >= 3 
            var phoneCheck = $('#modalContact #phone').val().length >= 14 
            var emailCheck = $('#modalContact #email').val().length >= 5 && $('#modalContact #email').val().includes('@')
    
            if (nameCheck && phoneCheck && emailCheck) {
                $('#modalContact .modal-button-contact').prop('disabled', false)
            } else {
                $('#modalContact .modal-button-contact').prop('disabled', true)
            }
        }

        $("#modalContact .check").on('change keydown paste input', function ()
        {
            checkModalContact()
        })
    
        $("#modalContact .modal-button-contact" ).click(function() {
            $.ajax ({
                type: "POST",
                url: "{{ url('/api/send-mail/contact') }}",
                timeout: 5000,
                data: {
                    "pet_id": petId,
                    "name": $('#modalContact #name').val(),
                    "phone": $('#modalContact #phone').val(),
                    "email": $('#modalContact #email').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    modalContact.hide()
                },
                error: function (data) {
                    console.log("Erro: " + data)
                }
            })
        });
        
        $('.phone').mask('(00) 00000-0000')
    
        $(".title-case").on('change keydown paste input', function ()
        {
            $(this).val(toTitleCase($(this).val()))
        })
    
        $(".lower-case").on('change keydown paste input', function ()
        {
            $(this).val($(this).val().toLowerCase())
        })
    })  

})
</script>
@endpush