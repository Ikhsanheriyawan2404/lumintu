<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ $title ?? config('app.name') }}</title> --}}

    <link rel="stylesheet" href="{{ asset('assets/report/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'PT-Serif', 'serif';
            background-color: #D5d8d8;
        }
    </style>

    {{-- @stack('custom-style') --}}
</head>

<body>

    <div class="container-fluid">
        @yield('content')
    </div>

</body>

</html>
