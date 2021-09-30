<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | {{config('app.name','YOURTUTOR')}}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/contact.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    @include('inc.style')
</head>

<body>
    @include('layouts.nav')
    @yield('contents')
    @include('layouts.footer')
    @include('inc.script')
</body>

</html>