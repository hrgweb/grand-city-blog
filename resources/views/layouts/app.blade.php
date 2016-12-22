<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/font-awesome.min.css') }}">
    @yield('head')

</head>
<body>
    @yield('main')

    <div class="container">
        @yield('content')
    </div>
    
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    @yield('footer')
</body>
</html>