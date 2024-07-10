<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row row-cols-1 row-cols-md-3 g-4 m-4">
        <div class="col">
            <div class="card h-100" style="background-color:#101a41;color:white;">
                <div class="card-body">
                    <h5 class="card-title" style="text-decoration: underline;">Usuarios</h5>
                    <p class="card-text">{{ $countUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100" style="background-color:#101a41;color:white;">
                <div class="card-body">
                    <h5 class="card-title" style="text-decoration: underline;">Publicaciones</h5>
                    <p class="card-text">25</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100" style="background-color:#101a41;color:white;">
                <div class="card-body">
                    <h5 class="card-title" style="text-decoration: underline;">Categorias</h5>
                    <p class="card-text">4</p>
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>