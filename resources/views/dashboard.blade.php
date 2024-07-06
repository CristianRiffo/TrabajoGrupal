<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text">10</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Publicaciones</h5>
                    <p class="card-text">25</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Categorias</h5>
                    <p class="card-text">4</p>
                </div>
            </div>
        </div>
    </div>
    <h1 style="text-align:center; margin-top:20px;">
        @hasrole('admin')
            Hola tienes usuario: Administrador
          @else
            @hasrole('writer')
                Hola tienes usuario: Escritor
            @else
                Hola tienes usuario: Visita
            @endhasrole
          @endhasrole
    </h1>
    
</x-app-layout>