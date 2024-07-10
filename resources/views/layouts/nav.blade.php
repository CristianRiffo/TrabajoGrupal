<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
  ul.nav.nav-pills.flex-column.mb-auto li a{
    margin:1px;
    height: 38px;
    border-radius: 5px;
  }

  ul.nav.nav-pills.flex-column.mb-auto li a:hover{
    background-color: #080d20;
    color: white !important;
  }

</style>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel" style="width: auto;">
    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;height: 100%;">
        <a href="/dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <span class="fs-4">{{_("Blog Aiep")}}</span>
        </a>
        <hr>
        <h4 style="text-align:center; margin:0px;">
          @hasrole('admin')
            Administrador
          @else
            @hasrole('writer')
              Escritor
            @else
              Visita
            @endhasrole
          @endhasrole
        </h4>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          @hasrole('admin')
          <li>
            <a href="#" class="nav-link link-body-emphasis">
              Usuarios
            </a>
          </li>
          @endhasrole
          <li>
            <a href="#" class="nav-link link-body-emphasis">
              Publicaciones
            </a>
          </li>
          <li>
            <a href="#" class="nav-link link-body-emphasis">
              Categorias
            </a>
          </li>
        </ul>
        <hr>

        @if(Auth::User()==null) 
            {{_("Visita")}}
        @else
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <strong>{{ Auth::user()->name }}</strong>
          </a>
          <ul class="dropdown-menu text-small shadow" style="">
            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <li><input type="submit" class="dropdown-item" href="#" value="Cerrar Sesion"></li>
            </form>
          </ul>
        </div>
        @endif
      </div>
    </div>
</div>

<div style="width:90%; margin:auto;">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      @hasanyrole('admin|writer')
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" >
            <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="20" height="20" viewBox="0 0 50 50">
                <path d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z"></path>
            </svg>
        </button>
      @endhasanyrole
        <a href="/dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none ml-3">
        <span class="fs-4">{{_("Blog Aiep")}}</span>
        </a>
    </header>
</div>
