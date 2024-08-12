@extends('layouts.app')

@section('content')
    <h1>{{ $movie->title }}</h1>
    <p>{{ $movie->description }}</p>
    @if ($movie->image)
        <img src="{{ Storage::url($movie->image) }}" alt="{{ $movie->title }}" width="200">
    @endif

    <a href="{{ route('movies.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
