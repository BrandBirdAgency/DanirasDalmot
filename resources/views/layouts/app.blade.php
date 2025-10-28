<!DOCTYPE html>
<html lang="en-NP">

<head>
    @include('inc.meta')
    <title>@yield('title') | {{config('app.name','Daniras Dalmoth')}}</title>
    @include('inc.style')
    <!-- CSS -->
    @yield('css')
</head>

<body>
    @include('layouts.header')
    <div class="superdiv">
        @yield('content')
    </div>
    @include('layouts.footer')
    @include('inc.script')
    @yield('js')
</body>

</html>