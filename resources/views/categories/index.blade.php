<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>
    <!-- Boton Crear nueva categoria -->
    <button type="button" class="btn btn-primary mt-5 ml-5" data-toggle="modal" data-target="#modalcreate">
        Crear Categoria
    </button>
    
    <table class="table table-striped mt-5" style="max-width:800px; margin:0 auto; border-color:black"; >
        <thead>
            <tr>
                <td>Title</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    {{ $category->title }}
                </td>
                <td width="20%">
                    @if ($loop->first)
                        <p style="margin:0; padding:0px">No Aplicable</p>
                    @endif
                    @if (!$loop->first)
                    <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#{{$category->slug}}" style="float: left;">Edit</button>
                        <form method="POST" action="{{ route('categories.destroy', $category->slug) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" style="float: left" data-toggle="modal" data-target="#confirmdelete-{{ $category->slug }}">
                                Borrar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="confirmdelete-{{ $category->slug }}" tabindex="-1" role="dialog" aria-labelledby="confirmdelete-{{ $category->slug }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Al eliminar la categoria todos las publicaciones referenciadas a ella se estableceran con "Sin categoria"
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-danger" value="Continuar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="{{$category->slug}}" tabindex="-1" role="dialog" aria-labelledby="{{$category->slug}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="POST" action="{{ route('categories.update', $category->slug) }}" id="{{$category->slug}}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container mt-6">
   
                                            @csrf
                                            @method('PUT')    
                                            <label for="exampleFormControlInput1">Titulo</label>                    
                                            <input type="text" class="form-control" style="width:100%;" name="title" value="{{ $category->title }}">

                                        </div>  
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <input type="submit" class="btn btn-primary"  value="Actualizar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modalcreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form method="post" action="{{ route('categories.store') }}" id="formcreate">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container mt-6">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Titulo</label>
                                <input type="text" class="form-control" style="width:100%;" id="title" name='title' value="{{ old('title') }}" placeholder="Nombre de la categoria...">
                            </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" form="formcreate" value="Crear">
                
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>