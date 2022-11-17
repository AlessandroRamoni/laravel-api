@extends('layouts.dashboard')

@section('content')
    <h2>{{ $category->name }}</h2>
    @foreach ($category->posts as $post)
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title }}</a>
        </div>
    @endforeach
@endsection
