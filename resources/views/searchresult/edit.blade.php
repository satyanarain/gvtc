@extends('searchresult.base')

@section('action-content')










<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <?php
$userid=Request::segment(2);
$usersql=DB::table('users')->where('id',$userid)->get();
foreach($usersql as $userdata){ ?>
          <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset("profilepicture/$userdata->profilepicture") }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ucfirst($userdata->username)}}</h3>

              <p class="text-muted text-center">{{ucfirst($userdata->institution)}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>First Name</b> <a class="pull-right" style="color:green">{{ucfirst($userdata->first_name)}}</a>
                </li>
                <li class="list-group-item">
                  <b>Last Name</b> <a class="pull-right" style="color:green">{{ucfirst($userdata->last_name)}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right" style="color:green">{{$userdata->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Purpose of Account</b> <a class="pull-right" style="color:green">{{$userdata->account}}</a>
                </li>
              </ul>

             
            </div>
            <!-- /.box-body -->
          </div>
          <?php } ?>
          <!-- /.box -->

          <!-- About Me Box -->
<!--          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
             /.box-header 
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
             /.box-body 
          </div>-->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9 ">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="box box-success"><a href="#activity" data-toggle="tab">Search Request</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                  
                  
               <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none">id</th> 
                  <th>&nbsp;@lang('menu.searchurl', array(),Session::get('language_val'))</th>
                  
                  <th class="action">@lang('menu.action', array(),Session::get('language_val'))</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php    
               $userid=Request::segment(2);
$searchsql=DB::table('searchresult')->where('uesrid',$userid)->get();
foreach($searchsql as $searchdata){ ?>
                
                <tr>
                   <td style="display:none">{{ $searchdata->id }}</td>
                   <td>{{ $searchdata->serchurl }}</td>
                   
           
                  <td>
               



<!--<button type="submit" class="btn-danger btn  mini blue-stripe" id="id_of_your_button" style="margin-left: 15px;"><i class="fa fa-trash"></i>&nbsp;Delete</button>-->

<?php adminapproval('searchresult',$searchdata->id,$searchdata->adminaprovel); ?> 
        
</td>

</tr>
<?php } ?>                
                    </form
                          

               
             
             
            </tbody>
                
              </table>
                
                
                
                
                
                
                

   
   
                
                
                
            </div>    
                  
               
                
              </div>
              <!-- /.tab-pane -->
            
              <!-- /.tab-pane -->

           
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>




















@endsection


