@extends('layouts.dashboard')

@section('content')
    <h1>{{ $tag->name }}</h1>


    <div @error('name') class="ar-is-invalid" @enderror>
        <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ old('name', $tag->name) }}">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <input type="submit" value="Aggiorna">
        </form>
    </div>

    <div class="my-2">
        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="DELETE">
        </form>
    </div>
@endsection
