<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BOBSHOP | {{ __('site.title') }}</title>

    <link href="https://unpkg.com/basscss@8.0.2/css/basscss.min.css" rel="stylesheet">
</head>
<body class="m0 relative">
    <img class="sm-hide md-hide lg-hide" src="/img/test-mobile.png" width="100%"/>
    <img class="xs-hide" src="/img/test-desktop.png" width="100%"/>
    <iframe id="test-chat" class="fixed bottom-0 col-12 sm-col-4 right-0" src="/{{ app()->getLocale() }}" height="46px" allowtransparency="true" frameborder="0" />
</body>
</html>
