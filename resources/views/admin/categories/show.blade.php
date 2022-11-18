@extends('layouts.dashboard')

@section('content')
    <h2>{{ $category->name }}</h2>

    <div class="mb-2">
        <a href="{{ route('admin.categories.edit', $category->id) }}">Modifica</a>
    </div>


    {{-- <div class="mb-2">
        <a href="{{ route('admin.categories.destroy', $category->id) }}">Elimina</a>
    </div> --}}

    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <input class="delete-btn" type="submit" value="Cancella" onclick="return confirm('Sei sicuro di volerlo cancellare?')">
    </form>

    @foreach ($category->posts as $post)
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title }}</a>
        </div>
    @endforeach
@endsection
