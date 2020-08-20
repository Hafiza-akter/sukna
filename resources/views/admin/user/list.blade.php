@extends('admin/master')
@section('title','User List')
@section('mainmodule',' USER')
@section('modulename','User')
@section('pagename','list')
@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
                <a class="btn btn-sm btn-primary float-right" href="{{route('useradd')}}" role="button"><i class="fas fa-plus"></i> Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Username</th>
                      <th>Loc level</th>
                      <th>Role </th>
                      <th>Location</th>
                      <th>Zoom level</th>
                      <th>User slide desc</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp
                  @foreach($userList as $user)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->user_loc_level }}</td>
                      <td>{{ $user->getUserRole->name }}</td>
                      <td>{{ $user->getUserLocation->upazila_name }}</td>
                      <td>{{ $user->zoom_level }}</td>
                      <td>{{ $user->user_slide_description }}</td>
                      <td>
                       <a href="{{route('useredit',$user->id)}}"><i class="fas fa-edit"></i></a>
                       <!-- <a href="" onclick="return confirm('Are you sure?')" class="disabled"><i class="fas fa-trash-alt disabled"></i></a> -->
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">{{ $userList->links() }}</div> 
              </div>
            </div>
      </div><!-- /.container-fluid -->

      @endsection