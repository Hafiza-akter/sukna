@extends('admin/master')
@section('title','Home')

@section('mainmodule','')
@section('modulename','home')
@section('pagename','home')
@section('content')
<div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
            
            <?php if(Session()->get('is_admin') !=1) { ?>
              <form role="form" class="form-horizontal" method="post" action="{{route('message')}}" enctype="multipart/form-data">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$user->id}}" id="userid">

              <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                          Custom Message
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button> -->
                        </div>
                        <!-- /. tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body pad">
                      <div class="mb-3">
                      <label class="col-sm-12 col-form-label">Message</label>
                        <textarea  placeholder="Place some text here" name="custom_message"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{($user->user_slide_description)? $user->user_slide_description : ''}}</textarea>
                      </div>
                      <div class="form-group  row">
                            <div class="col-sm-12"> 
                                <label class="col-sm-12 col-form-label">Image</label>
                               <?php if($user->user_slide_image != ''){ ?>
                                  
                                  <img src="{{asset('').$user->user_slide_image}}" id="imgthumb" style="{{($user->user_slide_image)? '':'display:none'}}; width:200px; height:auto"/>
                               <?php } ?>
                               <br> <a class="btn bg-danger btn-xs btn-danger" id="oldremove" style="{{($user->user_slide_image)? '':'display:none'}}">Remove</a>
                                <input type="file" name="user_slide_image"  id="imginput" style="{{($user->user_slide_image)? 'display:none':''}}" class="form-control">
                           </div>
                      </div>
                        <div class="form-group pt-5">
                               <button type="submit" class="btn-primary btn-sm">Submit</button>
                        </div>
                        <p class="text-sm mb-0">
                           <a href="#">
                          Feedback or custom message.</a>
                        </p>
                        
                      </div>
                    </div>    
                    </form>                
              <?php  }else{ 
                echo  '<h3 class="text-center">Dashboard</h3>';

                  }
                  ?>
        </div>
      </div> <!-- /.row-->
</div><!-- /.container-fluid -->
 @endsection