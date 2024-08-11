<!-- resources/views/employees/create.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Create Employee</title>
</head>

<body>
    <h1>Create Employee</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        <!-- اكسترا سييوترتي للفورم  -->
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}"><br>
        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" value="{{ old('salary') }}"><br>
        <button type="submit">Save</button>
    </form>
</body>

</html>