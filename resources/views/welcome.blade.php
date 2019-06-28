<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="/css/app.css" type="text/css"/>
    </head>
    <body>
        <div class="card position-relative">
            <button type="button" class="btn close position-absolute text-white" aria-label="Close" id="btn-close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 id="btn-launcher" class="card-header bg-primary text-center text-white text-uppercase">{{ __('chat.launcher') }}</h5>
            <div class="card-body">
                <div class="container-fluid" id="text-container">
                    <div class="row mb-2">
                        <div class="col-9 bg-light pt-2 pb-2 rounded">
                            {{ __('chat.greeting') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="container-fluid">
                    <div class="row">
                        <textarea id="question" class="form-control col-9"></textarea>
                        <button id="btn-send" class="col-3 btn-primary text-uppercase">{{ __('chat.send') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
