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
              <form role="form" class="form-horizontal" method="post" action="{{route('message')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$user->id}}">

              <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">
                          Custom Message
                        </h3>
                        <!-- tools box -->
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                          <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body pad">
                      <div class="mb-3">
                        <textarea class="customMessage" placeholder="Place some text here" name="custom_message"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  {{($user->user_slide_description)? $user->user_slide_description : ''}}
                                  </textarea>
                      </div>
                        <div class="form-group">
                               <button type="submit" class="btn btn-info">Submit</button>
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