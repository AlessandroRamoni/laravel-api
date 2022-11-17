@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>
    @if ($post->category)
        <p><a href="{{ route('admin.categories.show', $post->id) }}">{{ $post->category->name }}</a></p>
    @else
        <p>Nessuna categoria</p>
    @endif


    <p>{{ $post->content }}</p>

    <div>
        <h3>Tags:</h3>
        @foreach ($post->tags as $tag)
            <span>{{ $tag->name }}</span>
        @endforeach
    </div>



    <div class="mt-5">
        <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
    </div>

    <div class="mt-5">
        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="DELETE" onclick="return confirm('Sei sicuro di volerlo cancellare?')">
        </form>
    </div>
@endsection
