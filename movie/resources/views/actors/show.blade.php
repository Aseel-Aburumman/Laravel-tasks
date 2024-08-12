@extends('layouts.app')

@section('content')
    <h1>{{ $actor->name }}</h1>
    <p>Scenario: {{ $actor->scenario->description }}</p>
    @if ($actor->image)
        <img src="{{ Storage::url($actor->image) }}" alt="{{ $actor->name }}" width="200">
    @endif

    <a href="{{ route('actors.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
