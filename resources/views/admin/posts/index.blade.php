@extends('layouts.dashboard')

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.posts.create') }}">Add new Post</a>
    </div>
    <h2>
        Posts List:
    </h2>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
