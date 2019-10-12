<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('title')

    @stack('vendor_css')

    <!-- Styles -->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">

    @stack('additional_css')

</head>
<body>

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/base.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });
</script>
@stack('additional_js')
</body>
</html>