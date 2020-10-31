<!DOCTYPE html>
<html>
<head>
  <title>Sukna</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body >

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one loginback" >
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper">
      @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
        <p id="flashMessage" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
        @endif
        <form  method="post" action="{{route('loginsubmit')}}">
        {{ csrf_field() }}
          <div class="form-group">
            <label class="label">Username</label>
            <div class="input-group">
              <input type="text" class="form-control" name="email" placeholder="Email">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="password" placeholder="*********">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Login</button>
          </div>
         
        </form>
      </div>
      <ul class="auth-footer">
        <li>
          <a href="#">Conditions</a>
        </li>
        <li>
          <a href="#">Help</a>
        </li>
        <li>
          <a href="#">Terms</a>
        </li>
      </ul>
      <p class="footer-text text-center">copyright © 2020. All rights reserved.</p>
    </div>
  </div>
</div>

    </div>
  </div>
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('js/custom.js')}}"></script>
    <!-- base js -->
    <script src="{{asset('js/app_2.js')}}"> </script>
    <!-- end base js -->

    <!-- plugin js -->
        <!-- end plugin js -->

    </body>

</html>