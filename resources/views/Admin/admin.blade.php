<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <div id="h2"><span>Welcome <br><br>Mr.{{auth()->user()->name}} </span></div>
    <br>

    <div>
        <table>
            @foreach($users as $user)
            <tr>

                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <br>
    <br>
    <a href="{{route('logout')}}" class="btn"><button>Logout</button></a>

</body>

</html>