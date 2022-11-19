@extends('layouts.dashboard')

@section('content')
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
