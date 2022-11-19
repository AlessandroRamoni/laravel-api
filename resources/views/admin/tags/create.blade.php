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
    <form method="POST" action="{{ route('admin.tags.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Nome:</label>
            <input required maxlength="255" type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="category_id">Genere:</label>
            <select name="category_id">
                <option value="">Nessuna</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ $tag->id == old('tag_id', -1) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="content">Content:</label>
            <textarea required name="content" cols="30" rows="10">{{ old('content') }}</textarea>
            @error('content')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <h3>Tags:</h3>
            @foreach ($tags as $tag)
                <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} type="checkbox" name="tags[]"
                    value="{{ $tag->id }}">
                <label>{{ $tag->name }}</label>
            @endforeach
        </div>


        <div>
            <label for="image"></label>
            <input type="file" name="image">
        </div>

        <input type="submit" value="Create">
    </form>
    <div class="mt-5">
        <a href="{{ route('admin.tags.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
