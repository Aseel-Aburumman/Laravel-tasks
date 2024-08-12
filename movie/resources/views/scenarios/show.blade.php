@extends('layouts.app')

@section('content')
    <h1>Scenario Details</h1>
    <p>{{ $scenario->description }}</p>

    <a href="{{ route('scenarios.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
