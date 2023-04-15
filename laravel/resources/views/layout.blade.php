<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=x, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    @include('partials.nav')
    @yield('content')


</body>

</html>
