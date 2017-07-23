<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/main.css') }}">


    </head>
    <body>
        @include('includes.header')
        @yield('content')

        <script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('/js/post.js') }}"></script>
    </body>
</html>
