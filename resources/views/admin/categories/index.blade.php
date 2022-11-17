@extends('layouts.dashboard')

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.categories.create') }}">Aggiungi una nuova categoria!</a>
    </div>
    <h2>
        Lista categorie:
    </h2>

    <div class="row">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
