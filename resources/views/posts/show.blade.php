<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver publicacion') }}
        </h2>
    </x-slot>
    <div class="container mt-6">    
        <h1 style="text-align: center">{{ $post->title }}</h1>
        @if ($post->image != '')
            <img src="{{ url('/') }}/uploads/{{ $post->image }}">
        @endif
        <p> <div style="float: left;background-color: #ededd3;margin: 0px 5px 5px 0px;padding: 5px;border-radius: 5px;"> Publicado en: {{ $post->category->title }}</div>
            <div style="float: left;background-color: #ededd3;margin: 0px 5px 5px 0px;padding: 5px;border-radius: 5px;">Autor: {{ $post->User->name }}</div>
            <div style="float: left;background-color: #ededd3;margin: 0px 5px 5px 0px;padding: 5px;border-radius: 5px;">Fecha: {{ $post->updated_at->format("d-m-Y H:m:s") }}</div></p>
        <br>
        <div style="display:flex; width:100%;height: 45dvh;padding: 10px;background-color: #c9c99b;font-family: system-ui;color: black;font-weight: bold;">
            {{ $post->content }}
        </div>
        @hasanyrole('admin|writer')
        @if ($post->user_id == Auth::User()->id || Auth::User()->id==1 )
            <a href="{{ route('posts.edit', $post->slug) }}">Editar</a>  
        @endif
        @endhasanyrole    
</x-app-layout>