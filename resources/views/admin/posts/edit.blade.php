@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <h2>Form errors: please fill all spaces correctly!</h2>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Title:</label>
            <input required maxlength="255" type="text" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea required name="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <input type="submit" value="Apply changes">
    </form>
    <div class="mt-5">
        <a href="{{ route('admin.posts.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
