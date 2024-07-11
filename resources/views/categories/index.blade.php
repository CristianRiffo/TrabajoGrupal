@foreach ($categories as $category)
    Titulo: {{ _($category->title) }} / Slug: {{ _($category->slug) }}<br>
@endforeach