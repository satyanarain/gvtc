

<div class="box-body">
<div class="form-row">
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@elseif(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
@if($errors->any())
                   <ul class="list-group">
                       @foreach($errors->all() as $error)
                       <li class="list-group-item alert alert-danger">{{ $error }}</li>
                       @endforeach
                   </ul>
                   @endif
                   
<div class="form-group">
        {!! Form::label('name','User Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', $user->username, ['class' => 'form-control','required' => 'required','readonly'=>'readonly','style'=>'border:none;']) !!}
    </div>

<div class="form-group">
    {!! Form::label('email','Email ID', ['class' => 'control-label']) !!}
    {!! Form::text('email', $user->email, ['class' => 'form-control','readonly'=>'readonly','style'=>'border:none;']) !!}
</div>

<div class="form-group">
{!! Form::label('currentpassword','Old Password', ['class' => 'control-label']) !!}
    {{ Form::password('currentpassword', array('class' => 'form-control','value'=>'')) }}

</div>

<div class="form-group">
    {!! Form::label('password', 'New Password', ['class' => 'control-label']) !!}
   {{ Form::password('password', array('class' => 'form-control','required' => 'required')) }}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm New Password', ['class' => 'control-label']) !!}
   {{ Form::password('password_confirmation', array('class' => 'form-control','required' => 'required')) }}
</div>

 {!! Form::submit('Update Password', ['class' => 'btn btn-success']) !!}
                </div>
</div>
 