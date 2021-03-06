@extends('users-mgmt.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.user-profile', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('user-management.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

{!! Form::model($user, ['method' => 'PATCH','route' => ['user-management.update', $user->id],'files'=>true,'enctype' => 'multipart/form-data']) !!}
            
 
               <div class="box-body">
                   
                   
                <div class="form-row">
                    
                 
                  
                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-md-12">
                  <label for="exampleInputEmail1">@lang('menu.username', array(),Session::get('language_val'))</label>
                  <input type="text" name="username" readonly readonly=""  value="{{ $user->username }}" required  class="form-control"  placeholder="Enter Username" id="username" >
                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  </div>    
                   
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.name', array(),Session::get('language_val'))</label>
                  <input type="text" name="name" readonly value="{{ $user->name }}" required  class="form-control" id="name" placeholder="Enter name">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.address', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="address" readonly value="{{ $user->address }}" required  class="form-control" id="name" placeholder="Enter address">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                 <div class="form-row"> 
                  
                  
                  
                   <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputEmail1">@lang('menu.mobile_number', array(),Session::get('language_val'))</label>
                  <input type="text" name="mobilenumber" readonly value="{{ $user->mobilenumber }}" required  class="form-control" id="name" placeholder="Enter mobile">
                 @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  
                  
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
                  <img src="{{ asset("userdocument/$user->photoid") }}" height="80px" width="80px" /> 
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


