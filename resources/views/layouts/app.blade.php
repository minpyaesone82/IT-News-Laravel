<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/feather-icons-web/feather.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/css/style.css')}}">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1828/1828673.png">
    
</head>
<body>

@guest
    @yield('content')
    @else
    <section class="main container-fluid">
        <div class="row">
    
            @include('layouts.sidebar');
        </div>
    </section>
@endguest


<script src="{{asset('dashboard/vendor/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dashboard/js/app.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@yield('foot')

 @auth
    @empty(Auth::user()->phone)
        @include('profile.updateInfo')
    @endempty
 @endauth

     @include('layouts.toast');
     @include('layouts.alert');
 

</body>
</html>