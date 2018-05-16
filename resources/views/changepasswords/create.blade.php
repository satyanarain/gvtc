@extends('changepasswords.base')



@section('action-content')
<section class="content">
<div class="row">
    <div class="col-xs-12">
     <div class="box box-success">
            <div class="box-header box">
             <h3 class="box-title">@lang('menu.change_password', array(),Session::get('language_val')) </h3>
                  <div class="pull-right">
<a href="/home" class="btn btn-default">
<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;@lang('menu.back', array(),Session::get('language_val'))</a>
</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                {!! Form::open([
                'route' => 'changepasswords.store',
                'files'=>true,
                'autocomplete'=>'off',
                'enctype' => 'multipart/form-data'

                ]) !!}
                @include('changepasswords.form', ['submitButtonText' => Lang::get('user.headers.create_submit')])

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
</section>    
@stop

