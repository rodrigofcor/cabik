<div class="modal fade" id="modalShowPix" tabindex="-1" aria-labelledby="modalShowPixLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalShowPixLabel"><i class="fas fa-coins" style="color: #0D6EFD"></i> Pix</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <span class="text-center modal-pix"></span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
      </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function(e) {
    var modalShowPix = document.getElementById('modalShowPix')

    modalShowPix.addEventListener('show.bs.modal', function (event) {
        var modalButton = event.relatedTarget

        var modalPix = modalShowPix.querySelector('.modal-pix')

        var pix = modalButton.getAttribute('data-bs-pix')

        modalPix.textContent = pix
    })  

})
</script>
@endpush