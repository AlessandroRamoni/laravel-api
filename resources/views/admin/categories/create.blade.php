@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome categoria:</label>
            <input type="text" name="name" maxlength="30" value="{{ old('name', '') }}">
        </div>
        <div>
            <input type="submit" value="Crea">
        </div>
    </form>
@endsection
