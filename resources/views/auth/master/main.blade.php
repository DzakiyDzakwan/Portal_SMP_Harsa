<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @yield('title')
        
        <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/pages/auth.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/main/app-dark.css')}}" />

        <link rel="stylesheet" href="assets/css/shared/iconly.css" />
        @yield('style')
    </head>

    <body>
        @yield('content')
        <script src="{{asset('assets/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        @yield('script')
    </body>
</html>
