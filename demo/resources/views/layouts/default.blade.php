<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    {{--<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">--}}
    <title>demo</title>
    {{--<script src="{{ URL::asset('js/app.js') }}"></script>--}}
     @yield('css')

     @yield('js')
     
</head>

<body>
@yield('content')
</body>
</html>