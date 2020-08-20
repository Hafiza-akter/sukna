@extends('admin/master')
@section('mainmodule',' USER')
@section('modulename','User')
@section('pagename','edit user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit user</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('userlist')}}" role="button"><i class="fas fa-list"></i> User List</a>
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
              <form class="form-horizontal" method="post" action="{{route('userupdate')}}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="card-body">
                  <div class="form-group required row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" required value="{{$user->username}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="password"  placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">User loc level</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="user_loc_level" required>
                        <option value="district" {{($user->user_loc_level == 'district') ? 'selected' : ''}}>District</option>
                        <option value="upazila" {{($user->user_loc_level == 'upazila') ? 'selected' : ''}}>Upazila</option>
                        <option value="union" {{($user->user_loc_level == 'union') ? 'selected' : ''}}>Union</option>
                      </select>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group required row">
                        <label class="col-sm-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="role_id" required>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}" {{($user->role_id == $role->id) ? 'selected' : ''}}>{{$role->name}}</option>
                            @endforeach
                            </select>                    
                        </div>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <div class="form-group required row">
                        <label class="col-sm-4 col-form-label">Location</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="location_id" required>
                            @foreach($locations as $location)
                            <option value="{{$location->id}}" {{($user->location_id  == $location->id) ? 'selected' : ''}}>{{$location->upazila_name}}</option>
                            @endforeach
                            </select>                    
                        </div>
                      </div>
                    </div> 
                  </div>
                  <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Zoom level</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="zoom_level" value="{{$user->zoom_level}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="user_slide_description" value="{{$user->user_slide_description}}">
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>
@endsection