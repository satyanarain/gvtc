@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-weight:bold">Guest User</div>
                <?php
                if(!empty($userpassword)){
                $userid = DB::table('users')->select('*')->where('id','=',$id)->first();
                $userpassword = $userid->password;
                ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <h2 style="text-align:center">you are not authorized to access this URL.</h2>
              </div>
                <?php }else{ ?>
                
                <div class="panel-body">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {!! Session::get('success') !!}
              </div>
                @else
              
                    
                    <form class="form-horizontal" method="POST" action="{{ route('create_password.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="userid" value="{{$id}}"/>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-sub">
                                    Save
                                </button>
                                
                            </div>
                        </div>
                    </form>
                   @endif  
                </div>
<?php } ?>
            </div>
        </div>
    </div>
</div>
@endsection
