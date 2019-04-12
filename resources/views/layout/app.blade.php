<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body>
<div class="container">
    @include('layout.navbar')
</div>
@yield('content')
</body>
</html>
