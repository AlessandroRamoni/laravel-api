@extends('layouts.dashboard')

@section('content')
    {{-- @if ($errors->any())
        <h2>Form errors: please fill all spaces correctly!</h2>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
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
            <label for="category_id">Categoria:</label>
            <select name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
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

        <div>
            <label for="image">Aggiungi un'immagine:</label>
            <input type="file" name="image">
            <img class="img-fluid" src="{{ asset('storage/' . $post->cover_path) }} " alt="{{ $post->title }}">

        </div>

        {{-- @if ($errors->any())
            <div>
                <h3>Tags:</h3>
                @foreach ($tags as $tag)
                    <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} type="checkbox" name="tags[]"
                        value="{{ $tag->id }}">
                    <label>{{ $tag->name }}</label>
                @endforeach
            </div>
        @else
            <div>
                <h3>Tags:</h3>
                @foreach ($tags as $tag)
                    <input {{ $post->tags->contains($tag) ? 'checked' : '' }} type="checkbox" name="tags[]"
                        value="{{ $tag->id }}">
                    <label>{{ $tag->name }}</label>
                @endforeach
            </div>
        @endif --}}


        @if ($errors->any())
            <div @error('tags') class="is-invalid" @enderror>
                <label>Tags:</label>
                @foreach ($tags as $tag)
                    <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} type="checkbox" name="tags[]"
                        value={{ $tag->id }}>
                    <label>{{ $tag->name }}</label>
                @endforeach
            </div>
        @else
            <div>
                <label>Tags:</label>
                @foreach ($tags as $tag)
                    <input {{ $post->tags->contains($tag) ? 'checked' : '' }} type="checkbox" name="tags[]"
                        value="{{ $tag->id }}">
                    <label>{{ $tag->name }}</label>
                @endforeach
            </div>
        @endif

        {{-- <div>
            <label>Tags:</label>
            @foreach ($tags as $tag)
                <label>{{ $tag->name }}</label>
                @if ($errors->any())
                    <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} type="checkbox" name="tags[]"
                        value={{ $tag->id }}>
                @else
                    <input {{ $post->tags()->contains($tag) ? 'checked' : '' }} type="checkbox" name="tags[]"
                        value="{{ $tag->id }}">
                @endif
            @endforeach
        </div> --}}


        <input type="submit" value="Apply changes">
    </form>
    <div class="mt-5">
        <a href="{{ route('admin.posts.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
