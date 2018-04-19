@extends('layouts.app-template')

@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Manage Report Category</h1>
<div class="btn-group btn-breadcrumb breadcrumb-success" style="margin-top: 10px;">
<a href="/" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
<?php 
$link = route('home');
$count=0;
?>
<?php for($i = 1; $i <= count(Request::segments()); $i++){ 
        if($i < count(Request::segments()) & $i > 0){ 
        $link .= "/" . Request::segment($i);
        $arra = explode('/', $link);
        $urls = $arra[0] . '//' . $arra[1] . $arra[2] . '/' . $arra[4];
 
            if(is_numeric(Request::segment($i))){ 

            }else{ //echo Lang::get("menu.".Request::segment($i), array(),Session::get('language_val'));//echo Request::segment($i)?> 
                <a href="<?= $urls ?>" class="btn btn-success visible-lg-block visible-md-block ">
                    <!--{{ title_case(str_replace('taxons','Taxon',(Request::segment($i)))) }}-->
                     {{Lang::get("menu.".Request::segment($i), array(),Session::get('language_val'))}}   
                </a> 
    <?php   }
        }else{ 
            if(is_numeric(Request::segment($i))){
    
            }else{ 
                    ?>
                <div class="btn btn-primary btn-success">
                    <!--{{ title_case(str_replace('taxons','Taxon',(Request::segment($i)))) }}-->
                    {{Lang::get("menu.".Request::segment($i), array(),Session::get('language_val'))}} 
                </div>
    
   <?php
            }
        }
    $count++;
}?>
</div>
</section>
@yield('action-content')
<!-- /.content -->
</div>
@endsection



