@extends('admin/master')
@section('title','Add User')
@section('mainmodule',' USER')
@section('modulename','User')
@section('pagename','add user')


@section('content')
<div class="container-fluid">
  <div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12">
      <?php 
      // dd(Session()->get('is_admin'));
       if (Session()->get('is_admin') != 0) { ?>
               <h4 class="card-title text-center">Add User</h4>

          <div class="auto-form-wrapper col-lg-6 mx-auto ">
          @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form class="form-horizontal" method="post" action="{{route('userstore')}}" onsubmit="sortablesubmit()" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="form-group">
                <div class="input-group">
                  <input type="text" placeholder="Username" name="name" class="form-control" required> 
                  <div class="input-group-append"><span class="input-group-text">
                    Name<i class="mdi mdi-check-circle-outline"></i>
                  </span>
                    </div>
                  </div>
              </div> 
              <div class="form-group">
                <div class="input-group">
                  <input type="email" placeholder="Email" name="email" class="form-control" required> 
                  <div class="input-group-append"><span class="input-group-text">
                   Email<i class="mdi mdi-check-circle-outline"></i>
                  </span>
                    </div>
                  </div>
              </div> 
            <div class="form-group">
              <div class="input-group">
                <input type="password" placeholder="Password" name="password" class="form-control" required>
                 <div class="input-group-append"><span class="input-group-text">Password<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="number" placeholder="Phone" name="phone" class="form-control" required>
                 <div class="input-group-append"><span class="input-group-text">Phone<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div> 
            <div class="form-group">
              <div class="input-group">
                <!-- <input type="password" placeholder="Password" name="is_admin" class="form-control" required> -->
                <select class="form-control" required name="is_admin">
                    <option value="">--select--</option>
                    <option value="1">admin</option>
                    <option value="0">user</option>
                </select>
                 <div class="input-group-append"><span class="input-group-text">Is Admin?<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div>  
            <div class="form-group">
              <div class="input-group">
                <select class="form-control" required name="status">
                      <option value="">--select--</option>
                      <option value="1">Active</option>
                      <option value="0">Deactiavte</option>
                  </select>
                <!-- <input type="password" placeholder="Password" name="password" class="form-control" required> -->
                 <div class="input-group-append"><span class="input-group-text">Status<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="file" placeholder="Image" name="img" class="form-control" required>
                 <div class="input-group-append"><span class="input-group-text">Image<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div> 
            
          <div class="form-group d-flex justify-content-center">
        <div class="form-check form-check-flat mt-0"><label class="form-check-label">
            <div class="form-group">
              <button class="btn btn-primary submit-btn btn-block">Add</button>
            </div> 
            
            </form>
            </div>
      <?php  }else{
        // dd('dsfsdf');
        echo '<h4>Admin Dashboard</h4>';
      }
      ?>
    </div>
      </div>
    </div>
  </div>
    
  </div> <!-- /.row-->
</div><!-- /.container-fluid -->
@endsection