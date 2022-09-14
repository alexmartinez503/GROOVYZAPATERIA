<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'public\admin\css\custom.css' , 'public\admin\css\material-dashboard.css', 'public\admin\js\bootstrap-material-design.min.js', 'public\admin\js\jquery.min.js', 'public\admin\js\perfect-scrollbar.jquery.min.js', 'public\admin\js\popper.min.js',
])
</head>
<body>
<div class="wrapper ">
    @include('layouts.inc.sidebar')

    <div class="main-panel">
        @include('layouts.inc.adminnav')

            <div class="content">
                @yield('content')
            </div> 
            @include('layouts.inc.adminfooter')
    </div>

</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
    <script>
        swal("{{session('status')}}");
    </script>

@endif

@yield('scripts')
</body>
</html>
