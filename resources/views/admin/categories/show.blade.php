@extends('layouts.dashboard')

@section('content')
    <h2>{{ $category->name }}</h2>

    <div class="mb-2">
        <a href="{{ route('admin.categories.edit', $category->id) }}">Modifica</a>
    </div>

    @foreach ($category->posts as $post)
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title }}</a>
        </div>
    @endforeach
@endsection
