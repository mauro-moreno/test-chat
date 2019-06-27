<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="/css/app.css" type="text/css"/>
    </head>
    <body>
        <a class="btn btn-block btn-primary text-uppercase text-white">
            {{ __('chat.launcher') }}
        </a>
    </body>
</html>
