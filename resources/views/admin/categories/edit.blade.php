@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nome categoria:</label>
            <input type="text" name="name" maxlength="30" value="{{ old('name', $category->name) }}">
        </div>
        <div>
            <input type="submit" value="Aggiorna">
        </div>
    </form>
@endsection
