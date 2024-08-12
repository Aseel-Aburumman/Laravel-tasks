@extends('layouts.app')

@section('content')
    <h1>Movies</h1>
    <a href="{{ route('movies.create') }}" class="btn btn-primary">Add Movie</a>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>
                        @if ($movie->image)
                            <img src="{{ Storage::url($movie->image) }}" alt="{{ $movie->title }}" width="100">
                        @endif

                    </td>
                    <td>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST"
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
