<!DOCTYPE html>
<html>

<head>
  <title>NGO</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->

  <link rel="shortcut icon" href="favicon.ico">
  <!-- plugin css -->
  <link rel="stylesheet" href="{{asset('dist/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/perfect-scrollbar.css')}}">

  <!-- end plugin css -->

  <!-- plugin css -->
    <!-- end plugin css -->

  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="{{asset('dist/css/app2.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('dist/css/style.css')}}">

  <!-- end common css -->

</head>

<body>

  <div class="container-scroller" id="app">
  @include('admin.layout.header')

    <div class="container-fluid page-body-wrapper">
    @include('admin.layout.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('admin.layout.footer')

      </div>
    </div>
  </div>
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('js/custom.js')}}"></script>

  <!-- base js -->

  <script src="{{asset('dist/js/app.js')}}"></script>
  <script src="{{asset('dist/js/perfect-scrollbar.min.js')}}"></script>
  <!-- end base js -->

  <!-- plugin js -->
  <script src="{{asset('dist/js/chart.min.js')}}"></script>
  <script src="{{asset('dist/js/jquery.sparkline.min.js')}}"></script>
  <!-- end plugin js -->

  <!-- common js -->
  <script src="{{asset('dist/js/off-canvas.js')}}"></script>
  <script src="{{asset('dist/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('dist/js/misc.js')}}"></script>
  <script src="{{asset('dist/js/settings.js')}}"></script>
  <script src="{{asset('dist/js/todolist.js')}}"></script>
  <!-- end common js -->

  <script src="{{asset('dist/js/dashboard.js')}}"></script>
</body>


</html>