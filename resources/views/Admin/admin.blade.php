<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @vite('resources/css/admin.css')
    @vite('resources/js/admin.js')
</head>

<body>
    <div id="h2"><span>Welcome <br><br>Mr.{{auth()->user()->name}} </span></div>
    <br>

    <button class="btn" id="create-responsable-btn">Creer Responsable</button>

    <div class="container active">
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
    <div id="create-responsable-form-container" class="container">
        <form action="{{route('create.responsable')}}" method="post">
            @csrf
            <h1>Ajouter Responsable</h1>
            <div class="input-box">
                <input type="text" name="name" id="name" placeholder="Username">
                <i class='fa-duotone fa-solid fa-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Email">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password">
                <i class='fa-solid fa-lock'></i>
            </div>
            <button type="submit" class="btn">Ajouter</button>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
            @endif
            @if(session()->has('error'))
            <div>{{session('error')}}</div>
            @endif
            @if(session()->has('success'))
            <div>{{session('success')}}</div>
            @endif

        </form>
    </div>


    <br>
    <br>
    <a href="{{route('logout')}}" class="btn"><button>Logout</button></a>

</body>

</html>