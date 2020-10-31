@extends('admin/auth/master')
@section('title', 'Registration')

@section('content')   
        <div class="card-header">
            <h3 class="card-title">Sign Up</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-horizontal" method="post" action="{{route('registration.submit')}}">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group row required">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" required class="form-control"  name="email" placeholder="Email">
            </div>
            </div>
            <div class="form-group row required">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="password" required class="form-control" name="password"  placeholder="Password">
            </div>
            </div>
            <div class="form-group row required">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-9">
                <input type="number" required class="form-control"  name="phone" placeholder="Phone">
            </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>

        </div>
        <!-- /.card-footer -->
        </form>
 @endsection