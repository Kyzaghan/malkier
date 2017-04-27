<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap Latest minified Css -->
    <link rel="stylesheet" href="{{ asset('css/plugin/bootstrap/bootstrap.min.css') }}" media="screen">

    <!-- App Css -->
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">

    @yield('header')
</head>
<body>
@include('includes.header')
<div class="container">
    @yield('content')
</div>

<!-- JQuery Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Notify JS Latest compiled and minified JavaScript -->
<script src="{{ asset('js/plugin/notify/notify.min.js') }}"></script>

@yield('footer')
</body>
</html>
