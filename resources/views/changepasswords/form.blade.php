

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
        {!! Form::label('name',Lang::get('menu.username',array(),Session::get('language_val')), ['class' => 'control-label']) !!}
        {!! Form::text('name', $user->username, ['class' => 'form-control','required' => 'required','readonly'=>'readonly','style'=>'border:none;']) !!}
    </div>

<div class="form-group">
    {!! Form::label('email',Lang::get('menu.email_id',array(),Session::get('language_val')), ['class' => 'control-label']) !!}
    {!! Form::text('email', $user->email, ['class' => 'form-control','readonly'=>'readonly','style'=>'border:none;']) !!}
</div>

<div class="form-group">
{!! Form::label('currentpassword',Lang::get('menu.old_password',array(),Session::get('language_val')), ['class' => 'control-label']) !!}
    {{ Form::password('currentpassword', array('class' => 'form-control','value'=>'')) }}

</div>

<div class="form-group">
    {!! Form::label('password',Lang::get('menu.new_password',array(),Session::get('language_val')), ['class' => 'control-label']) !!}
   {{ Form::password('password', array('class' => 'form-control','required' => 'required')) }}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation',Lang::get('menu.confirm_new_password',array(),Session::get('language_val')), ['class' => 'control-label']) !!}
   {{ Form::password('password_confirmation', array('class' => 'form-control','required' => 'required')) }}
</div>

 {!! Form::submit(Lang::get('menu.update_password',array(),Session::get('language_val')), ['class' => 'btn btn-success']) !!}
                </div>
</div>
 