<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear una nueva categoria') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
      @hasanyrole('admin|writer')
          <form method="post" action="{{ route('categories.store') }}">
          @csrf

          <div class="form-group">
            <label for="exampleFormControlInput1">Titulo</label>
            <input type="text" class="form-control" id="title" name='title' value="{{ old('title') }}" placeholder="Nombre de la publicacion...">
          </div>
          <input type="submit" value="Crear">
        </form>

      @else

        <h3>No tienes permitido acceder a esta vista! :(</h3>
        <p>Primero tienes que <a href="/login">ingresar</a></p>

    @endhasanyrole
    </div>  
</x-app-layout>