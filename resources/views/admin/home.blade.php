@extends('admin/master')
@section('title','Home')

@section('mainmodule','')
@section('modulename','home')
@section('pagename','home')
@section('content')
<div class="container-fluid">
  <div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12">
      <?php 
      // dd(Session()->get('is_admin'));
       if (Session()->get('is_admin') == 0) { ?>
               <h4 class="card-title text-center">Add Deposit</h4>

          <div class="auto-form-wrapper col-lg-6 mx-auto ">
            <form action="#"><div class="form-group">
              <div class="input-group">
                <input type="text" placeholder="Username" class="form-control"> 
                <div class="input-group-append"><span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span></div>
              </div>
            </div> 
            <div class="form-group">
              <div class="input-group">
                <input type="text" placeholder="Amount" class="form-control">
                 <div class="input-group-append"><span class="input-group-text"><i class="mdi mdi-check-circle-outline"></i></span>
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