@extends('layouts.dashboard')

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.posts.create') }}">Aggiungi post</a>
    </div>
    <h2>
        Elenco dei post:
    </h2>

    <div class="row">
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                    @if ($post->category)
                        [{{ $post->category->name }}]
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
