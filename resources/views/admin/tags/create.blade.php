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

        <input type="submit" value="Create">
    </form>
    <div class="mt-5">
        <a href="{{ route('admin.tags.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
