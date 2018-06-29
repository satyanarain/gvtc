@extends('users-mgmt.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
                
             <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">@lang('menu.user-profile', array(),Session::get('language_val'))</h3>
          
        </div>
        <div class="col-sm-4" >

          <a class="btn btn-primary btn-template" href="{{ route('user-management.edit', ['id' => $user->id]) }}"><i class="fa fa-pencil"></i>&nbsp;@lang('menu.edit', array(),Session::get('language_val'))</a>
          
      
          
        </div>
    </div>   
                
             
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($user, ['method' => 'PATCH','route' => ['user-management.update', $user->id],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                   
                   
                <div class="form-row">
                    
                 
                  
                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-md-12">
                  <label for="exampleInputEmail1">@lang('menu.username', array(),Session::get('language_val'))</label>
                  <input type="text" name="username" readonly readonly=""  value="{{ $user->username }}" required  class="form-control"  placeholder="Enter User Name" id="username" >
                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  </div>    
                   
                
                   <?php if($user->role=='guest'){ ?> 
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="first_name" class="control-label">First Name</label>
                  <input type="text" name="first_name" value="{{ $user->first_name }}" required  class="form-control" id="first_name" placeholder="Enter Fisrt Name">
                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="last_name" class="control-label">Last Name</label>
                  <input type="textarea" name="last_name" value="{{ $user->last_name }}" required  class="form-control" id="name" placeholder="Enter Last Name">
                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                   <?php } ?> 
                   
                   
                   <?php if($user->role=='guest'){ ?> 
                   <div class="form-row">
                  
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="first_name" class="control-label">Institution Type</label>
                  <input type="text" name="first_name" value="{{ $user->institution_type }}" required  class="form-control" id="first_name" placeholder="Enter Fisrt Name">
                 @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="last_name" class="control-label">Institution / Organization / Company</label>
                  <input type="textarea" name="last_name" value="{{ $user->institution }}" required  class="form-control" id="name" placeholder="Enter Last Name">
                 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                   <?php } ?>
                   
                <div class="form-row">
                  <?php if($user->role!='guest'){ ?> 
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.name', array(),Session::get('language_val'))</label>
                  <input type="text" name="name" readonly value="{{ $user->name }}" required  class="form-control" id="name" placeholder="Enter name">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  <?php } ?>
                  
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.address', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="address" readonly value="{{ $user->address }}" required  class="form-control" id="name" placeholder="Enter address">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div> 
                   <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Purpose of Account</label>
                  <input type="textarea" name="address" readonly value="{{ $user->account }}" required  class="form-control" id="name" placeholder="Enter address">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                   
                   
                   
                   
                  
                  
                 <div class="form-row"> 
                  
                  
                  <?php if($user->role!='guest'){ ?>
                   <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.mobile_number', array(),Session::get('language_val'))</label>
                  <input type="text" name="mobilenumber" readonly value="{{ $user->mobilenumber }}" required  class="form-control" id="name" placeholder="Enter mobile">
                 @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  <?php } ?>
                  <?php if($user->role=='guest'){ ?>
                   <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Phone Number</label>
                  <input type="text" name="mobilenumber" readonly value="{{ $user->mobilenumber }}" required  class="form-control" id="name" placeholder="Enter mobile">
                 @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                  </div>   
                  <?php } ?>  
                  
                  
                  
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.email_address', array(),Session::get('language_val'))</label>
                  <input type="email" name="email" readonly value="{{ $user->email }}" required  class="form-control" id="email" placeholder="Enter email">
               @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                  
                
                 </div> 
                   
                   
                    <div class="form-row"> 
                        
                       <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">Country of Residence</label>
                  <input type="text" name="mobilenumber" readonly value="{{ $user->country }}" required  class="form-control" id="name" placeholder="Enter mobile">
                 @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                  </div>   
                    </div>
                   
                   
                   

                   
                   
                   
                 
                   <?php if($user->role!='guest'){ ?>
                  <div class="form-row"> 
                  <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.department', array(),Session::get('language_val'))</label>
                  <input type="text" name="department" readonly value="{{ $user->department}}" required  class="form-control" id="department" placeholder="Enter Department">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.designation', array(),Session::get('language_val'))</label>
                  <input type="text" name="designation" readonly value="{{ $user->designation}}" required  class="form-control" id="designation" placeholder="Enter Designation">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  </div>
                  
                  <div class="form-row">
                  <div class="form-group{{ $errors->has('photoid') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.photo_id', array(),Session::get('language_val'))</label>
                  
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photoid') }}</strong>
                                    </span>
                                @endif
<!--                <img src="{{ asset("userdocument/$user->photoid") }}" height="80px" width="80px" /> -->
                 <a href="{{ asset("userdocument/$user->photoid") }}">Document</a>
                 
                  <input type="hidden" name="edit_userdocument" value="{{ $user->photoid }}" />
                  </div>  
                 
                  
                  <div class="form-group{{ $errors->has('profilepicture') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.profile_picture', array(),Session::get('language_val'))</label>
                  
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilepicture') }}</strong>
                                    </span>
                                @endif
                    <img src="{{ asset("profilepicture/$user->profilepicture") }}" height="80px" width="80px" />            
                    <input type="hidden" name="edit_profilepicture" value="{{ $user->profilepicture }}" />   
                   
                  </div> 
                  </div>
                   <?php } ?>
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
                  
<!--                <div class="form-group col-md-6">
                    <input type="hidden" id="role"  value="user"  class="form-control" name="role" >
                </div>  -->
                  
              </div>    
              <!-- /.box-body -->
                
<!--              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">@lang('menu.update', array(),Session::get('language_val'))</button>
              </div>-->
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection


