<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear una nueva publicacion') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
      @hasanyrole('admin|writer')
          <form method="post" action="{{ route('posts.store') }}">
          @csrf

          <div class="form-group">
            <label for="exampleFormControlInput1">Titulo</label>
            <input type="text" class="form-control" id="title" name='title' value="{{ old('title') }}" placeholder="Nombre de la publicacion...">
          </div>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Contenido</label>
              <textarea class="form-control" id="content" name='content' rows="3">{{ old('content') }}</textarea>
          </div>
          <div class="form-group">
              <input class="form-control" style="display:none;" id="user_id" name='user_id' value="{{ Auth::User()->id }}" rows="3">{{ old('content') }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Categoria</label>
            <select class="form-control" id="category_id" name='category_id'>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
          </div>
          <input type="submit" value="Crear">
        </form>

      @else

        <h3>No tienes permitido publicar contenido! :(</h3>
        <p>Primero tienes que <a href="/login">ingresar</a></p>

    @endhasanyrole
    </div>  
</x-app-layout>