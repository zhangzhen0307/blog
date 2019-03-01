<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts._header')
    @include('shared._messages')
    <div class=" container">
        @yield('content')
    </div>
    @include('layouts._footer')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>