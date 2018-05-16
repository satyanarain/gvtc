<!DOCTYPE html>
<html>
<head>
  <title>Greater Virunga Transboundary Collaboration | {{ Request::segment(1)}} </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link  rel="stylesheet" href="{{ asset('/front/bootstrap/css/bootstrap.min.css')}}">   
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <script src="{{ asset ("/front/bootstrap/js/jquery.min3.3.1.js") }}"></script>
  <script src="{{ asset ("/front/bootstrap/js/bootstrap.min.js") }}"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
  <link rel="stylesheet" href="{{ asset('/front/css/style.css')}}">
  </head>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118984792-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118984792-1');
</script>

</head>
<!--<body oncontextmenu="return false;" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">-->
@include('layouts_frontend.header')
<!-- Header -->

<!-- Wildlife Conversation Society -->
 @yield('homeBanner coverBack')
  
@include('layouts_frontend.footer')

