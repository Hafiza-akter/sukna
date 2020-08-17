@extends('auth/master')
@section('title', 'Login')

@section('content')   

              <div class="card-header">
                <h3 class="card-title">Registration</h3>
              </div>
              <div class="card-body">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email address">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Create Password">
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Confirm password">
                </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a href="{{route('login')}}" type="button" class="btn btn-link">Sign In</a>
                <!-- /input-group -->
              </div>
              <!-- /.card-body -->

 @endsection