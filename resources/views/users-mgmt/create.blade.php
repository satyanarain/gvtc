@extends('users-mgmt.base')

@section('action-content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">@lang('menu.create', array(),Session::get('language_val')) @lang('menu.user', array(),Session::get('language_val'))</h3>
              <div class="pull-right">
<a href="{{ route('user-management.index') }}" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>
&nbsp; @lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
        
            
            
            <form role="form"   method="POST" action="{{ route('user-management.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="box-body">
                  
                  
                <div class="form-row">
                    
              
                    
                    
                  <input id="status" type="hidden" class="form-control" name="status" value="1">
                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-md-12 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.username', array(),Session::get('language_val'))</label>
                  
                  <input type="text" name="username"    value="{{ old('username') }}" required  class="form-control"  placeholder="Enter Username" id="username" >
                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  </div>  
                  
                  
                  
                  
                  
                <div class="form-row">
                  
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.name', array(),Session::get('language_val'))</label>
                  <input type="text" name="name" value="{{ old('name') }}" required  class="form-control" id="name" placeholder="Enter name">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.address', array(),Session::get('language_val'))</label>
                  <input type="textarea" name="address" value="{{ old('address') }}" required  class="form-control" id="name" placeholder="Enter address">
                 @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                </div> 
                  
                  
                 <div class="form-row"> 
                  
                  
                  
                   <div class="form-group{{ $errors->has('mobilenumber') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.mobile_number', array(),Session::get('language_val'))</label>
                  <input type="tel" name="mobilenumber" value="{{ old('mobilenumber') }}" required  class="form-control" id="name" placeholder="Enter mobile">
                 @if ($errors->has('mobilenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  
                  
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.email_address', array(),Session::get('language_val'))</label>
                  <input type="email" name="email" value="{{ old('email') }}" required  class="form-control" id="email" placeholder="Enter email">
               @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                  
                
                 </div> 
                 
                  
                  <div class="form-row"> 
                  <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.department', array(),Session::get('language_val'))</label>
                  <input type="text" name="department" value="{{ old('department') }}" required  class="form-control" id="department" placeholder="Enter Department">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  
                  
                  <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" class="control-label">@lang('menu.designation', array(),Session::get('language_val'))</label>
                  <input type="text" name="designation" value="{{ old('designation') }}" required  class="form-control" id="designation" placeholder="Enter Designation">
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                  </div>  
                  </div>
                  
                  <div class="form-row">
                  <div class="form-group{{ $errors->has('photoid') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" >@lang('menu.photo_id', array(),Session::get('language_val'))</label>
                  <input accept=".pdf,.jpg,.jpeg,.png,.gif"  id="documents1" onchange="validFile(this,1)" type="file" name="photoid"    class=""  >
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photoid') }}</strong>
                                    </span>
                                @endif
                  </div>  
                 
                  
                  <div class="form-group{{ $errors->has('profilepicture') ? ' has-error' : '' }} col-md-6 required">
                  <label for="exampleInputEmail1" >@lang('menu.profile_picture', array(),Session::get('language_val'))</label>
                  <input  accept=".jpg,.jpeg,.png,.gif"  id="documents2" onchange="validImg(this)" type="file" name="profilepicture"    class=""  >
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilepicture') }}</strong>
                                    </span>
                                @endif
                  </div> 
                  </div>
                  
                  
                  
                  
<!--                   <div class="form-row">
                  
                <div class=" form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" id="password"  class="form-control" name="password" required  placeholder="Password">
                  
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                 <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" required  class="form-control" id="password_confirmation" placeholder="Password">
                </div>
                
              </div>-->
                  
                <div class="form-group col-md-6">
                    <input type="hidden" id="role"  value="user"  class="form-control" name="role" >
                </div>  
                
                <div class="form-group col-md-6">
                    <input type="hidden" id="role"  value="{{Auth::id()}}"  class="form-control" name="created_by" >
                </div>
                  
              </div>    
              <!-- /.box-body -->
                
              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sub">@lang('menu.save', array(),Session::get('language_val'))</button>
              </div>
            </form>
          </div>
         

        </div>
    
      </div>
      <!-- /.row -->
    </section>



@endsection
