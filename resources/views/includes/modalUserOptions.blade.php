<div class="modal fade" id="modalUserOptions" tabindex="-1" aria-labelledby="modalUserOptionsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalUserOptionsLabel"><i class="fas fa-user-alt" style="color: #0D6EFD"></i> Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="profile-photo-modal text-center"><figure><img src="{{ Auth::user()->avatar }}"/></figure></div>
          </div>
          <div class="row">
            <h5 class="text-center mt-3">{{ Auth::user()->name }}</h5>
          </div>
          <div class="row">
            <h6 class="text-center">{{ Auth::user()->login }}</h6>
          </div>
          <div class="row mt-4">
              <form>
                  <a href="{{ route('user.show', Auth::user()) }}" type="button" class="btn btn-primary w-100">Mostrar Perfil</a>
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