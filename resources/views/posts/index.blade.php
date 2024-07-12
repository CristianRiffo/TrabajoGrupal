<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>
    <a href="{{ route('posts.create') }}">Crear Publicacion</a>
    <table style="
    width: 90%;
    margin: auto;
    text-align: center;
    margin-top: 50px;
    border-style: solid;
    border-width: 1px;
    border-color: black;
">
        <thead>
            <tr>
                <td>Titulo</td>
                <td>
                    Contenido
                </td>
                <td>
                    Publicado
                </td>
                <td>
                    Categoria
                </td>
                <td>
                    Autor
                </td>
                <td>Accion</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->content }}
                    </td>
                    <td>
                        @if ($post->posted)
                            Verdadero
                        @else
                            Falso
                        @endif
                        
                    </td>
                    <td>
                        {{ $post->category->title }}
                    </td>
                    <td>
                        {{ $post->user->name }}
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $post->slug) }}">Ver</a>
                        <a href="{{ route('posts.edit', $post->slug) }}">Edit</a>
                        <form method="POST" action="{{ route('posts.destroy', $post->slug) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
