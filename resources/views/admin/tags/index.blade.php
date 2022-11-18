@extends('layouts.dashboard')

@section('content')
    @foreach ($tags as $tag)
        <div class="my-2">
            <a href="{{ route('admin.tags.show', $tag->id) }}">{{ $tag->name }}</a>
        </div>
    @endforeach
@endsection
