<!DOCTYPE html>
<html>
<head>
  <title>Greater Virunga Transboundary Collaboration | <?php if(Request::segment(1)=="search"){echo "Search History";}else{ echo ucfirst(Request::segment(1));} ?>  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link  rel="stylesheet" href="{{ asset('/front/bootstrap/css/bootstrap.min.css')}}">   
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <script src="{{ asset ("/front/bootstrap/js/jquery.min3.3.1.js") }}"></script>
  <script src="{{ asset ("/front/bootstrap/js/bootstrap.min.js") }}"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
  <link rel="stylesheet" href="{{ asset('/front/css/style.css')}}">
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118984792-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118984792-1');
</script>


<script language="JavaScript">

//////////F12 disable code////////////////////////
//    document.onkeypress = function (event) {
//        event = (event || window.event);
//        if (event.keyCode == 123) {
//           //alert('No F-12');
//            return false;
//        }
//    }
//    document.onmousedown = function (event) {
//        event = (event || window.event);
//        if (event.keyCode == 123) {
//            //alert('No F-keys');
//            return false;
//        }
//    }
//document.onkeydown = function (event) {
//        event = (event || window.event);
//        if (event.keyCode == 123) {
//            //alert('No F-keys');
//            return false;
//        }
//    }
/////////////////////end///////////////////////


//Disable right click script
//visit http://www.rainbow.arch.scriptmania.com/scripts/
var message="Sorry, right-click has been disabled";
///////////////////////////////////
//function clickIE() {if (document.all) {(message);return false;}}
//function clickNS(e) {if
//(document.layers||(document.getElementById&&!document.all)) {
//if (e.which==2||e.which==3) {(message);return false;}}}
//if (document.layers)
//{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
//else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
//document.oncontextmenu=new Function("return false")
////
//function disableCtrlKeyCombination(e)
//{
////list all CTRL + key combinations you want to disable
//var forbiddenKeys = new Array('a', 'n', 'c', 'x', 'v', 'j' , 'w');
//var key;
//var isCtrl;
//if(window.event)
//{
//key = window.event.keyCode;     //IE
//if(window.event.ctrlKey)
//isCtrl = true;
//else
//isCtrl = false;
//}
//else
//{
//key = e.which;     //firefox
//if(e.ctrlKey)
//isCtrl = true;
//else
//isCtrl = false;
//}
//if ctrl is pressed check if other key is in forbidenKeys array
//if(isCtrl)
//{
//for(i=0; i<forbiddenKeys.length; i++)
//{
//case-insensitive comparation
//if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
//{
//alert('Key combination CTRL + '+String.fromCharCode(key) +' has been disabled.');
//return false;
//}
//}
//}
//return true;
//}
</script>
</head>

<body>
@include('layouts_frontend.header')
<!-- Header -->

<!-- Wildlife Conversation Society -->
 @yield('homeBanner coverBack')
  
@include('layouts_frontend.footer')

