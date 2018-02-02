@extends('layouts.app-template')

@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
 <script type="text/javascript">
                $(function () {
                    $('#lstFruits').multiselect({
                        includeSelectAllOption: true
                    });
                    $('#btnSelected').click(function () {
                        var selected = $("#lstFruits option:selected");
                        alert(selected);
                        var message = "";
                        selected.each(function () {
                            message += $(this).text() + " " + $(this).val() + "\n";
                        });
                        alert(message);
                    });
                });
             </script>
<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"type="text/javascript"></script>
<section class="content-header">
<h1>Manage Distributions</h1>
<div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
<a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
<?php 
$link = route('home');
$count=0;
?>
@for($i = 1; $i <= count(Request::segments()); $i++) 
@if($i < count(Request::segments()) & $i > 0) <?php
$link .= "/" . Request::segment($i);
$arra = explode('/', $link);
$urls = $arra[0] . '//' . $arra[1] . $arra[2] . '/' . $arra[4];
 
if(is_numeric(Request::segment($i))){ 
    
}else{
?> 
<a href="<?= $urls ?>" class="btn btn-success visible-lg-block visible-md-block ">
    {{ucfirst(Request::segment($i))}}
</a> 
<?php } ?>
@else 
<?php 
    if(is_numeric(Request::segment($i))){ 
    
}else{
    ?>
<div class="btn btn-primary btn-success">

    
    {{ title_case(str_replace('','',(Request::segment($i)))) }}
    </div>
    
   <?php
}

?>  

@endif 
<?php $count++; ?>
@endfor
</div>
</section>
@yield('action-content')
<!-- /.content -->
</div>
@endsection



