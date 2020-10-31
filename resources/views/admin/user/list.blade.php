@extends('admin/master')
@section('title','User List')
@section('mainmodule',' USER')
@section('modulename','User')
@section('pagename','list')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User List</h4>
        <h4  class="text-right"><i class="mdi mdi-account-multiple-plus"></i> <a href="{{route('useradd')}}" style="font-size: 14px;"> Add User</a></h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> # </th>
                <th> Name </th>
                <th> Phone </th>
                <th> Image </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
            @php $i=1 @endphp
            @foreach($userList as $user)
              <tr>
              <td>{{ $i++ }}</td>
                <td>{{ $user->name}}</td>
              
                <td>
                {{ $user->phone }}
                </td>
                <td>
                  <?php if(!$user->img) { ?>
                    <img src="{{asset('dist/img/avatar2.png')}}" style="width:50px">
                  <?php }  else{ ?>
                <img src="{{asset('images/'.$user->img)}}" style="width:50px">
                <?php } ?>
                </td>
                <td>
                  <a href="{{route('useredit',$user->id)}}"><i class="mdi mdi-tooltip-edit"></i></a>
                  <!-- <a href="" onclick="return confirm('Are you sure?')" class="disabled"><i class="fas fa-trash-alt disabled"></i></a> -->
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
                <div class="float-right">{{ $userList->links() }}</div> 
        </div>
      </div>
    </div>
  </div>

      @endsection