@extends('changepasswords.base')



@section('action-content')
<section class="content">
<div class="row">
    <div class="col-xs-12">
     <div class="box box-success">
            <div class="box-header box">
             <h3 class="box-title">Change Password</h3>
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

