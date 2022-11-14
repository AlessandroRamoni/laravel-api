@extends('layouts.dashboard')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <div class="mt-5">
        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
    </div>
@endsection
