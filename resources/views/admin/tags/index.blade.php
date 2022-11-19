@extends('layouts.dashboard')

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.tags.create') }}">Aggiungi tag</a>
    </div>

    <div class="my-2">
        <ul>
            @foreach ($tags as $tag)
                <li>
                    <a href="{{ route('admin.tags.show', $tag->id) }}">{{ $tag->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
