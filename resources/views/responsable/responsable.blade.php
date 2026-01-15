<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsable</title>
</head>

<body>
    <div id="h2"><span>Welcome <br><br>Mr.{{auth()->user()->name}} Vous etes maintenant responsable</span></div>
    <br>
    <a href="{{route('logout')}}" class="btn"><button>Logout</button></a>
</body>

</html>