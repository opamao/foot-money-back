<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title>:: Foot Money :: {{ $titre }}</title>

    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/bootstrap/css/bootstrap.min.css" />
    @stack('haut')
    <link rel="stylesheet" href="{{ asset('') }}assets/css/main.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/theme1.css" />
</head>

<body class="font-montserrat">
    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>
    <div id="main_content">
        @include('layouts.menu')
        <div class="page">
            @include('layouts.header')
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    @include('layouts.script')
</body>

</html>
