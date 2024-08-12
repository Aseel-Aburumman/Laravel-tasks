@extends('layouts.app')

@section('content')
    <h1>Actors</h1>
    <a href="{{ route('actors.create') }}" class="btn btn-primary">Add Actor</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Scenario</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actors as $actor)
                <tr>
                    <td>{{ $actor->id }}</td>
                    <td>{{ $actor->name }}</td>
                    <td>
                        @if ($actor->image)
                            <img src="{{ Storage::url($actor->image) }}" alt="{{ $actor->name }}" width="100">
                        @endif
                    </td>
                    <td>{{ $actor->scenario->description }}</td>
                    <td>
                        <a href="{{ route('actors.show', $actor->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('actors.edit', $actor->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('actors.destroy', $actor->id) }}" method="POST"
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
