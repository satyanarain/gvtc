<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Greater Virunga Transboundary Collaboration</title>
<!-- Bootstrap core CSS -->
 <link rel="icon" href="{{ asset('/front/img/favicon.ico') }}" type="image/gif" sizes="16x16"> 
<input type="hidden" id="userlogged" name="userlogged" value=" <?php if (Auth::check()) {echo 1;}else{echo 0;}?>"/>



<link rel="stylesheet" href={{ asset('/front/bootstrap/css/bootstrap.min.css')}} >
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href={{ asset('/front/css/style.css')}} >






</head>
<body id="page-top">
@include('layouts_frontend.header')
<!-- Header -->

<!-- Wildlife Conversation Society -->
 @yield('bg-light')
  
@include('layouts_frontend.footer')