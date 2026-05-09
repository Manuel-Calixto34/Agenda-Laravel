<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? 'Agenda'}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900">
@auth
    @include('layouts.navigation')
@endauth

<div class="container mx-auto px-4 py-6">
    {{$slot}}
</div>

</body>
</html>
