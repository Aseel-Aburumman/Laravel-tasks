<!-- resources/views/items/index.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Items</title>
</head>

<body>
    <h1>Table Data</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Column1</th>
            <th>Column2</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->column1 }}</td>
            <td>{{ $item->column2 }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>