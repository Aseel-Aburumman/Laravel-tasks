@extends('layouts.app')

@section('content')
    <h1>Edit Actor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('actors.update', $actor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $actor->name) }}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @if ($actor->image)
                <img src="{{ Storage::url($actor->image) }}" alt="{{ $actor->name }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group">
            <label for="scenario_id">Scenario</label>
            <select name="scenario_id" id="scenario_id" class="form-control">
                @foreach ($scenarios as $scenario)
                    <option value="{{ $scenario->id }}" {{ $actor->scenario_id == $scenario->id ? 'selected' : '' }}>
                        {{ $scenario->description }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
