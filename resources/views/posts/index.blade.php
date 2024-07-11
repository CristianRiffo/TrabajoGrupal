    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    
    <table>
    <thead>
        <tr>
            <td>Id</td>
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
    </tr>
    </thead>
    <tbody>
    @foreach ($posts as $p)
    <tr>
    <td>
    {{ $p->id }}
    </td>
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
    </tr>
    <a href>boton</a>
    @endforeach
    </tbody>
    </table>
</x-app-layout>