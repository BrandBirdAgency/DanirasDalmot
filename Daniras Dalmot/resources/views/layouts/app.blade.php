<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title') | {{config('app.name','Daniras Dalmoth')}}</title>
        @include('inc.style')
        @yield('css')
        <!-- CSS -->
        <link rel="stylesheet" href="./assets/css/style.css" />

    </head>
<body>
@include('layouts.header')
@yield('content')
@include('layouts.footer')
@include('inc.script')
@yield('js')
</body>
</html>
