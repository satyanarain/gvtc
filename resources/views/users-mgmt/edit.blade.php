@extends('users-mgmt.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Update User Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($user, ['method' => 'PATCH','route' => ['user-management.update', $user->id],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                   
                   
                  <div class="form-row">
                    
                 
                  
                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-md-12">
                  <label for="exampleInputEmail1">User Name</label>
                  <input type="text" name="username"  readonly=""  value="{{ $user->username }}" required  class="form-control"  placeholder="Enter User Name" id="username" >
                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  </div>    
                   
                   
                   
                   
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Name</label>
                  <input type="text" name="name" value="{{ $user->name }}" required  class="form-control" id="name" placeholder="Enter name">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Address</label>
                  <input type="textarea" name="address" value="{{ $user->address }}" required  class="form-control" id="name" placeholder="Enter address">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                 <div class="form-row"> 
                  
                  
                  
                   <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Mobile Number</label>
                  <input type="text" name="mobilenumber" readonly="" value="{{ $user->mobilenumber }}" required  class="form-control" id="name" placeholder="Enter mobile">
                 @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  
                  
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Email Address</label>
                  <input type="email" name="email" readonly="" value="{{ $user->email }}" required  class="form-control" id="email" placeholder="Enter email">
               @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                  
                
                 </div> 
                 
                  
                  <div class="form-row"> 
                  <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Department</label>
                  <input type="text" name="department" value="{{ $user->department}}" required  class="form-control" id="department" placeholder="Enter Department">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">Designation</label>
                  <input type="text" name="designation" value="{{ $user->designation}}" required  class="form-control" id="designation" placeholder="Enter Designation">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  </div>
                  
                  <div class="form-row">
                  <div class="form-group{{ $errors->has('photoid') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Photo ID</label>
                  <input type="file" name="photoid" accept=".pdf,.jpg,.jpeg,.png,.gif"  id="documents1" onchange="validFile(this,1)"   class="" id="photoid" >
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photoid') }}</strong>
                                    </span>
                                @endif
<!--                  <img src="{{ asset("userdocument/$user->photoid") }}" height="80px" width="80px" /> -->
                  <?php if($user->photoid!='default_document.png'){ ?>
                 <a target="_blank" href="{{ asset("userdocument/$user->photoid") }}">Document</a>
                  <?php } ?>
                  <input type="hidden"  name="edit_userdocument" value="{{ $user->photoid }}" />
                  </div>  
                 
                  
                  <div class="form-group{{ $errors->has('profilepicture') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Profile Picture</label>
                  <input type="file" name="profilepicture"   accept=".jpg,.jpeg,.png,.gif"  id="documents2" onchange="validFile(this,2)" class=""  >
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilepicture') }}</strong>
                                    </span>
                                @endif
                    <img src="{{ asset("profilepicture/$user->profilepicture") }}" height="80px" width="80px" />            
                    <input type="hidden" name="edit_profilepicture" value="{{ $user->profilepicture }}" />   
                   
                  </div> 
                  </div>
                  
<!--                   <div class="form-row">
                  
                <div class=" form-group col-md-6">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" id="password"  class="form-control" name="password"   placeholder="Password">
                  
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" id="password_confirmation" name="password_confirmation"   class="form-control" id="password_confirmation" placeholder="Password">
                </div>
                
              </div>-->
                  
                <div class="form-group col-md-6">
                    <input type="hidden" id="role"  value="user"  class="form-control" name="role" >
                </div>  
                  
              </div>    
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">Update</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


