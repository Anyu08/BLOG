@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Publicación</h1>
    <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required class="input-field">
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" required class="input-field">{{ old('description', $post->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagen (opcional):</label>
            <input type="file" id="image" name="image" accept="image/*" class="input-field">
            @if ($post->image)
                <p>Imagen actual:</p>
                <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen actual" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="submit-btn">Actualizar</button>
    </form>
</div>
@endsection
