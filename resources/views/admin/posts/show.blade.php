@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <div class="mt-5">
        <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
    </div>

    <div class="mt-5">
        <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="DELETE">
        </form>
    </div>
@endsection
