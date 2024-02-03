<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>課題システム</title>

        <link href="/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body class="antialiased" style="background:#ebf5fa; ">

        @yield('content')

        <script src="/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>