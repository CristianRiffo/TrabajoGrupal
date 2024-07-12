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
                <td>Title</td>
                <td>
                    Content
                </td>
                <td>
                    Posted
                </td>
                <td>
                    Category
                </td>
                <td>
                    User
                </td>
                <td>Accion</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>
                        {{ $p->title }}
                    </td>
                    <td>
                        {{ $p->content }}
                    </td>
                    <td>
                        {{ $p->posted }}
                    </td>
                    <td>
                        {{ $p->category->title }}
                    </td>
                    <td>
                        {{ $p->user->name }}
                    </td>
                    <td>
                        <a href>boton 1</a>
                        <a href>boton 2</a>
                        <a href>boton 3</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
