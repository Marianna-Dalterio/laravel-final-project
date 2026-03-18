<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sito Web Progetto Finale</title>
    <!--applico bootstrap!-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    @include('admin.partials.header')
    <main class="container py-4">
        @yield('content')
    </main>

</body>

</html>
