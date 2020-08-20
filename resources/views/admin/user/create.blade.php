@extends('admin/master')
@section('title','Add User')
@section('mainmodule',' USER')
@section('modulename','User')
@section('pagename','add user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add new user</h3>
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
              <form class="form-horizontal" method="post" action="{{route('userstore')}}">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group required row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" required placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" required class="form-control" name="password" required placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label class="col-sm-2 col-form-label">User loc level</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="user_loc_level" required>
                        <option value="district">District</option>
                        <option value="upazila">Upazila</option>
                        <option value="union">Union</option>
                      </select>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group required row">
                        <label class="col-sm-4  required col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="role_id" required>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            </select>                    
                        </div>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <div class="form-group required row">
                        <label class="col-sm-4 required col-form-label">Location</label>
                        <div class="col-sm-8">
                            <select class="form-control" required name="location_id" required>
                            @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->upazila_name}}</option>
                            @endforeach
                            </select>                    
                        </div>
                      </div>
                    </div> 
                  </div>
                  <div class="form-group required row">
                    <label class="col-sm-2 col-form-label">Zoom level</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" required name="zoom_level" placeholder="Zoom level">
                    </div>
                  </div>
                <div class="form-group required row">
                  <label class="col-sm-2 col-form-label">Station</label>
                    <div class="col-sm-10 select2-purple">
                      <select class="select2" name="ffwc_sations[]" required multiple="multiple" data-placeholder="Select a station" data-dropdown-css-class="select2-purple" style="width: 100%;">
                          @foreach($ffwcStations as $ffwcStation)
                            <option value="{{$ffwcStation->id}}">{{$ffwcStation->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Custom message</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="user_slide_description" placeholder="Slide description"></textarea>
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