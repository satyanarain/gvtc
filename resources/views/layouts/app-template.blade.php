<?php $rt=Config::get('app.locales');
$session_lan= Session::get('language_val');?>
<!DOCTYPE html>
<html lang="<?php if($rt[0]==$session_lan){
     
      echo"en";
  }
  if($rt[1]==$session_lan){
     
      echo"fr";
  } ?>">
    <?php
    //$searchurl=Session::put('searchurl', $searchurl);
    
    
    ?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--  <title>{{ config('app.name', 'Laravel') }}</title>-->
<title>GVTC Admin Panel </title>
    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href={{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}>
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset("/bower_components/font-awesome/css/font-awesome.min.css") }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href={{ asset("/bower_components/Ionicons/css/ionicons.min.css") }}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset("/dist/css/AdminLTE.min.css") }}>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href={{ asset("/dist/css/skins/_all-skins.min.css") }}>
  <link rel="stylesheet" href={{ asset("/dist/css/custom.css") }}>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset ("/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href={{ asset("/bower_components/morris.js/morris.css") }}>
  <!-- jvectormap -->
  <link rel="stylesheet" href={{ asset("/bower_components/jvectormap/jquery-jvectormap.css") }}>
  <!-- Date Picker -->
  <link rel="stylesheet" href={{ asset("/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{ asset("/bower_components/bootstrap-daterangepicker/daterangepicker.css") }}>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href={{ asset("/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}>
  <script src="{{ asset ("/bower_components/jquery/dist/jquery.min.js") }}"></script>
  <script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
  <link rel="stylesheet" href="http://usrz.github.io/bootstrap-languages/languages.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset ("/js/validation.js") }}"></script>
    <script src="{{ asset ("/js/custom.js") }}"></script>
</head>
<body class="hold-transition skin-green sidebar-mini">
<?php
$contnamet=\Route::current()->getName();
$contname=explode('.',$contnamet);
if($contname[0] == 'species' OR $contname[0] == 'gazetteer' OR $contname[0]=='distribution' OR $contname[0]=='observer' ) { ?>
<?php }else {?>
<div id="load"></div>
<?php } ?>
   
    
   
  
<div class="wrapper">

    <!-- Main Header -->
    @include('layouts.header')
    
    <!-- Sidebar -->
    @include('layouts.sidebar')
    @yield('content')
    <!-- /.content-wrapper -->
    <!-- Footer -->
    @include('layouts.footer')
    



