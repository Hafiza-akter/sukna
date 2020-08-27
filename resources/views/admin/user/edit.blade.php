@extends('admin/master')
@section('mainmodule',' USER')
@section('modulename','User')
@section('pagename','edit user')
@section('title','edit user')

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
                      <input type="email" class="form-control" name="email" required value="{{$user->username}}" id="email_address">
                      <span id="email_check"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password"  placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label class="col-sm-2 col-form-label">Role</label>
                      <div class="col-sm-10">
                          <select class="form-control" required name="role_id" id="role_id" required>
                          <option value="">--select--</option>
                          @foreach($roles as $role)
                          <option value="{{$role->id}}" {{($user->role_id == $role->id) ? 'selected' : ''}}>{{$role->name}}</option>
                          @endforeach
                          </select>                    
                      </div>
                  </div>
                  <span id="locuserfield">
                    <?php if($user->user_loc_level == 'district' || $user->user_loc_level == 'upazila' || $user->user_loc_level == 'union'){ ?>
                      <div class="form-group  row">
                      <label class="col-sm-2 col-form-label">User level</label>
                            <div class="col-sm-10">
                              <select class="form-control" id="user_level" name="user_loc_level">
                                <option value="">--select--</option>
                                <option value="district" {{($user->user_loc_level == 'district') ? 'selected' : ''}}>District</option>
                                <option value="upazila" {{($user->user_loc_level == 'upazila') ? 'selected' : ''}}>Upazila</option>
                                <option value="union" {{($user->user_loc_level == 'union') ? 'selected' : ''}}>Union</option>
                            </select> 
                      </div>
                    <?php } ?>
                      </div>
                      <div class="form-group  row" id="district">
                      <label class="col-sm-2 col-form-label">District</label>
                            <div class="col-sm-10"> 
                                <select class="form-control select2bs4" style="width: 100%;" name="district" id="district_name">
                                <option value="">--select--</option>
                                @foreach($districts as $district)
                                  <option value="{{$district->id}}" {{ $district->district_name == $user->getUserLocation->district_name ? 'selected' : '' }}>{{$district->district_name}}</option>
                                @endforeach
                                </select>                
                            </div>
                      </div>

                      <div class="form-group  row" id="upazila">
                  <label class="col-sm-2 col-form-label">Upazila</label>
                        <div class="col-sm-10"> 
                            <select class="form-control select2bs4" style="width: 100%;" name="upazila" id="upazila_name" id="upazila_name">
                            <option value="">--select--</option>
                              @foreach($upazilas as $upazila)
                                  <option value="{{$upazila->id}}" {{ $upazila->upazila_name == $user->getUserLocation->upazila_name ? 'selected' : '' }}>{{$upazila->upazila_name}}</option>
                                @endforeach
                            </select>                
                        </div>
                  </div>

                  <div class="form-group  row" id="union">
                  <label class="col-sm-2 col-form-label">Union</label>
                        <div class="col-sm-10"> 
                            <select class="form-control select2bs4" style="width: 100%;" name="union" id="union_name" id="union_name">
                            <option value="">--select--</option>
                              @foreach($unions as $union)
                                  <option value="{{$union->id}}" {{ $union->union_name == $user->getUserLocation->union_name ? 'selected' : '' }}>{{$union->union_name}}</option>
                              @endforeach
                            </select>                
                        </div>
                  </div>
                  
                  <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Zoom level</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="zoom_level" value="{{$user->zoom_level}}">
                    </div>
                  </div>

                  <div class="form-group  row">
                  <label class="col-sm-2 col-form-label">Station</label>
                    <div class="col-sm-10 select2-purple">
                      <select class="select2" name="ffwc_sations[]"  multiple="multiple" data-placeholder="Select a station" data-dropdown-css-class="select2-purple" style="width: 100%;">
                          @foreach($ffwcStations as $ffwcStation)
                              <option value="{{$ffwcStation->id}}"{{(in_array($ffwcStation->id, $userStations)) ? 'selected="true"':''}}>{{$ffwcStation->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12"><p class="text-bold slide mt-3">Assign Slides and Sorting</p></div>
                    <div class="col-sm-12">
                    <ul id="sortable">
                    <?php
                    if($slide_num != 0){
                      $n = count($slide_num);
                      // dd($n);
                      for($j=1;$j<=2;$j++){
                        if($j==1){
                          for( $i=0; $i< $n; $i++){
                            foreach($slideDetails as $slideDetail){
                              if($slideDetail->id == $slide_num[$i]){ ?>
                                <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><input class="habi form-check-input mr-2" name="slide[]" value="{{$slideDetail->id}}"  checked type="checkbox"><span class="habi">{{$slideDetail->slide_name}}</span></li>
                              <?php }
                            }
                          }
                        }else{
                          foreach($slideDetails as $slideDetail){
                            if(!(in_array($slideDetail->id, $slide_num))){ ?>
                              <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><input class="habi form-check-input mr-2" name="slide[]" value="{{$slideDetail->id}}"  type="checkbox"><span class="habi">{{$slideDetail->slide_name}}</span></li>
                            <?php }
                          }
                        }
                      }
                    }
                    else{?>
                      @foreach($slideDetails as $slideDetail)
                        <li id="{{$slideDetail->id}}" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><input name = "slide[]" value="{{$slideDetail->id}}" class="habi form-check-input mr-2" type="checkbox"><span class="habi">{{$slideDetail->slide_name}}</span></li>
                        @endforeach
                   <?php }
                          
                        ?>
                       
                       </ul>
                    </div>
                  </div>
                 </span>
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