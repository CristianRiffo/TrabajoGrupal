<form method="POST" action="{{ route('categories.update', $Category->slug) }}">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $Category->title }}">

    <button>Actualizar</button>
</form>