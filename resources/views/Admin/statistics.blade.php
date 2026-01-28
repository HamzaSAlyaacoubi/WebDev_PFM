<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    @vite('resources/css/adminStatistics.css')
    @vite('resources/js/adminStatistics.js')
</head>

<body>
    @include('include.adminHeader')
<main>
    <h1>Welcome Mr.{{auth()->user()->name}}</h1>

</main>

</body>

</html>