<!-- resources/views/employees/edit.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>
</head>

<body>
    <h1>Edit Employee</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $employee->name }}">
        </div>
        <div>
            <label>Phone:</label>
            <input type="text" name="phone" value="{{ $employee->phone }}">
        </div>
        <div>
            <label>Salary:</label>
            <input type="text" name="salary" value="{{ $employee->salary }}">
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>