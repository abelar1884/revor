<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>



    </head>
    <body>
        {{Form::open(['url' => '/manga/upload', 'class' => 'class', 'file' => true])}}
        <input type="file" multiple name="files[]">
        <input  name="name">
        <input type="submit">
        {{Form::close()}}
    </body>
</html>
