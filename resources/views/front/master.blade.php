<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{asset('img/sova-icon.png')}}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="personal tax, corporate tax, cloud tax, cloud accounting, cloud bookkeeping, online, web">
    <meta name="robots" content="none"> <!-- Выключение поисковых роботов  -->
    <title>Web Taxes</title>

    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{mix('assets/css/app.css')}}">

    @yield('link')

</head>
<body>

@yield('content')

@include('components.footer')

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/aes.js')}}"></script>
<script src="{{asset('assets/js/function.js')}}"></script>

@yield('scripts')

</body>
</html>

