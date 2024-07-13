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
                    <p class="card-text">{{ $countPosts }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100" style="background-color:#101a41;color:white;">
                <div class="card-body">
                    <h5 class="card-title" style="text-decoration: underline;">Categorias</h5>
                    <p class="card-text">{{ $countCategories }}</p>
                </div>
            </div>
        </div>
    </div>
    @hasanyrole('admin|writer')
    <h2>Tus ultimas publicaciones</h2>
    <table class="table" style="margin: 0 auto; width:90%; margin-bottom:55px;">
        <thead>
          <tr>
            <th scope="col">Portada</th>
            <th scope="col">Titulo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Autor</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($Posts as $Post)
            @if($Post->user_id == Auth::User()->id) 
                <tr class="component-filter" data-filter="{{$Post->Category->title}}" onclick="window.location='{{ route('posts.show', $Post->slug) }}'" style="cursor:pointer;">
                    <a href="{{ route('posts.show', $Post->slug) }}">
                        @if ($Post->image != '')
                            <td><img width="60px" src="{{ url('/') }}/uploads/{{ $Post->image }}"></td>
                        @else
                            <td></td>
                        @endif
                    <td>{{$Post->title}}</td>
                    <td>{{$Post->Category->title}}</td>
                    <td>{{$Post->User->name}}</td>
                    </a>
                </tr>    
            @endif
        @endforeach
        </tbody>
    </table>
    @endhasanyrole
</x-app-layout>