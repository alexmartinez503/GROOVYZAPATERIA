<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">


    <link  href="{{asset('frontend/css/linearicons.css')}}" rel="stylesheet">
    <link  href="{{asset('frontend/css/themify-icons.css')}} " rel="stylesheet">
    <link  href="{{asset('frontend/css/font-awesome.min.css')}} " rel="stylesheet">
    <link  href="{{asset('frontend/css/bootstrap.css')}} " rel="stylesheet">
    <link  href="{{asset('frontend/css/owl.carousel.css')}} " rel="stylesheet">
    <link  href="{{asset('frontend/css/nice-select.css')}} " rel="stylesheet">
    <link  href="{{asset('frontend/css/nouislider.min.css')}} " rel="stylesheet">
    <link  href="{{asset('frontend/css/ion.rangeSlider.css')}} " rel="stylesheet" />
    <link  href="{{asset('frontend/css/ion.rangeSlider.skinFlat.css')}} "  rel="stylesheet"/>
    <link  href="{{asset('frontend/css/magnific-popup.css')}} " rel="stylesheet">
    <link  href="{{asset('frontend/css/main.css')}}" rel="stylesheet">

    <!--fuentes de google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


    <!--fuentes de bootrasp-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

    <style>
        a{
            text-decoration: none !important;
            color: black;
        }
    </style>
</head>
<body>

<header class="header_area sticky-header ">
        @include('layouts.inc.frontnavbar')
    
    </header>
    <!-- Final del Header -->



    <div class="content mt-5">
        @yield('content')
    </div> 





    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>


    <script src="{{asset('frontend/js/vendor/jquery-2.2.4.min.js ')}} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{asset('frontend/js/vendor/bootstrap.min.js ')}} "></script>
    <script src="{{asset('frontend/js/jquery.ajaxchimp.min.js ')}} "></script>
    <script src="{{asset('frontend/js/jquery.nice-select.min.js ')}} "></script>
    <script src="{{asset('frontend/js/jquery.sticky.js ')}} "></script>
    <script src="{{asset('frontend/js/nouislider.min.js ')}} "></script>
    <script src="{{asset('frontend/js/countdown.js')}} "></script>
    <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}} "></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}} "></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{asset('frontend/js/gmaps.min.js')}} "></script>
    <script src="{{asset('frontend/js/main.js')}} "></script>


    
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
    <script>
        swal("{{session('status')}}");
    </script>

@endif

@yield('scripts')
</body>
</html>
