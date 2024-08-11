<!-- resources/views/employees/index.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Employee List</title>
</head>

<body>
    <h1>Employees</h1>

    @if ($message = Session::get('success'))
    <div>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->salary }}</td>
            <td>
                <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>