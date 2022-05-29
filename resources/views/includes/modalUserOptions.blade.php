<div class="modal fade" id="modalUserOptions" tabindex="-1" aria-labelledby="modalUserOptionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalUserOptionsLabel"><i class="fas fa-user-alt" style="color: #0D6EFD"></i> Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <img class="profile-photo-modal mx-auto" src="{{ url('storage/' . Auth::user()->profile_photo) }}"/>
                <h5 class="text-center mt-3">{{ Auth::user()->name }}</h5>
                <h6 class="text-center">{{'@' . Auth::user()->id }}</h6>
            </div>
            <div class="row mt-4">
                <form>
                    <button type="button" class="btn btn-primary w-100">Mostrar Perfil</button>
                </form>
            </div>
            <div class="row mt-4">
                <form action="{{ route("logout") }}" method="POST">
                    @csrf
                    
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>