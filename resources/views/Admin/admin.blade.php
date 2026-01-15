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
                @if($user->type === "utilisateur")
                <td><a href="{{route('toResponsable', $user->id)}}"><button>Rendre Responsable</button></a></td>
                @endif
                @if($user->type === "responsable")
                <td><a href="{{route('toUtilisateur', $user->id)}}"><button>Rendre Utilisateur</button></a></td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>

    <br>
    <br>
    <a href="{{route('logout')}}" class="btn"><button>Logout</button></a>

</body>

</html>