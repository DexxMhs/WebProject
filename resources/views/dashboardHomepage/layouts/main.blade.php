<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBSI</title>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- HEADER -->
    {{-- @include('dashboardHomepage.partials.navbar') --}}

    @yield('body')

    <script src="{{ asset('js/script.js') }}"></script>
    @yield('js')
</body>

</html>
