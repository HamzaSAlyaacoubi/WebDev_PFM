<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Catégories de ressources</h1>
    <table border=1>
        <tr>
            <th>Category name</th>
            <th>Description</th>
            <th>More Infos</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td><a href="{{ url('/categories/'.$category->id.'/resources') }}">More Infos</a></td>
        </tr>
    @endforeach
    </table>


</body>
</html>
