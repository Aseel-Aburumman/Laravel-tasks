@extends('layouts.app')

@section('content')
    <h1>Scenarios</h1>
    <a href="{{ route('scenarios.create') }}" class="btn btn-primary">Add Scenario</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scenarios as $scenario)
                <tr>
                    <td>{{ $scenario->id }}</td>
                    <td>{{ $scenario->description }}</td>
                    <td>
                        <a href="{{ route('scenarios.show', $scenario->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('scenarios.edit', $scenario->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('scenarios.destroy', $scenario->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
