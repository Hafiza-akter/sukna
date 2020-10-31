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
               <h4 class="card-title text-center">Edit User</h4>

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
              <form class="form-horizontal" method="post" action="{{route('userupdate')}}" onsubmit="sortablesubmit()" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="form-group">
                <div class="input-group">
                  <input type="text" placeholder="Username" value="{{$user->name}}" name="name" class="form-control" required> 
                  <div class="input-group-append"><span class="input-group-text">
                    Name<i class="mdi mdi-check-circle-outline"></i>
                  </span>
                    </div>
                  </div>
              </div> 
              <div class="form-group">
                <div class="input-group">
                  <input type="email" placeholder="Email" value="{{$user->email}}" name="email" class="form-control" required> 
                  <div class="input-group-append"><span class="input-group-text">
                   Email<i class="mdi mdi-check-circle-outline"></i>
                  </span>
                    </div>
                  </div>
              </div> 
              <div class="form-group">
              <div class="input-group">
                <input type="password" placeholder="Password" name="password" class="form-control" >
                 <div class="input-group-append"><span class="input-group-text">Password<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div>
           
            <div class="form-group">
              <div class="input-group">
                <input type="number" placeholder="Phone" value="{{$user->phone}}" name="phone" class="form-control" required>
                 <div class="input-group-append"><span class="input-group-text">Phone<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div> 
            <div class="form-group">
              <div class="input-group">
                <!-- <input type="password" placeholder="Password" value="{{$user->name}}" name="is_admin" class="form-control" required> -->
                <select class="form-control" required  name="is_admin">
                    <option value="">--select--</option>
                    <option value="1"  {{($user->is_admin == 1) ? 'selected' : ''}}>admin</option>
                    <option value="0" {{($user->is_admin == 0) ? 'selected' : ''}}>user</option>
                </select>
                 <div class="input-group-append"><span class="input-group-text">Is Admin?<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div>  
            <div class="form-group">
              <div class="input-group">
                <select class="form-control" required name="status">
                      <option value="">--select--</option>
                      <option value="1" {{($user->status == 1) ? 'selected' : ''}}>Active</option>
                      <option value="0" {{($user->status == 0) ? 'selected' : ''}}>Deactiavte</option>
                  </select>
                <!-- <input type="password" placeholder="Password" value="{{$user->name}}" name="password" class="form-control" required> -->
                 <div class="input-group-append"><span class="input-group-text">Status<i class="mdi mdi-check-circle-outline"></i></span>
                </div>
              </div>
            </div>
            <input type="hidden"  value="{{$user->id}}" name="id"  >

            <div class="form-group">
              <div class="input-group">
                        @php $image = $user->img @endphp
                          <img src="{{asset('images/'.$user->img)}}" class="remove-img" style="width:200px; height:auto"/>
                          <input type="file" name="img"  id="inputimg" style="{{($image)? 'display:none':''}}" class="form-control">
                 <div class="input-group-append">
                   <span class="input-group-text">
                        <a class="btn btn-danger" id="remove-btn" style="{{($image)? '':'display:none'}}">Remove</a>
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