@extends('frontend.layouts.default')
<head>
<title>Self Drive Cars for your Domestic and International Trips</title>
<meta name="description" content="Call +91-7666947247 and book your car now! Carz247 is a car rental service that provides Self Drive Cars for all your Domestic and International Trips">
<meta name="keywords" content="self drive cars,rent car,carz247,international car booking">
<meta name="author" content="Infini Systems">
<meta charset="UTF-8">
</head>



@section('content')



<style>

    div#_isolate-searchboxHolder { margin: auto; }
#_isolate-searchboxHolder{width:500px;}
#middle.full_width{padding:15px 20px;}

    input[type=text],select{ height: 30px; }
	
	._isolate #jse-sbox-submit{background: #c42119 !important;
border-color: #862c28 !important;
display: block;
height: 32px;
line-height: 31px;
padding: 0 0 1px 0;
color: #fff;
background: none;
margin: 0;
text-align: center;
font-weight: bold;
font-size: 13px;
cursor: pointer;
width: auto;
text-transform: uppercase;
font-weight:normal;
margin: 10px;

 }
 ._isolate #jse-sbox-top{padding:0px;}
 ._isolate #jse-sbox-submit span{line-height:23px;}
._isolate #jse-sbox-top h1{font-size: 16px !important; padding: 20px 10px 0px 15px;}
._isolate .form_block{padding:15px; margin-bottom:0px; }
._isolate #jse-sbox-container select, ._isolate #jse-sbox-container input{height: 34px;
resize: none;
font-family: 'Cabin', sans-serif;
background: #f0f3f5;
font-size: 13px;
border: 1px solid;
border-color: #d7dfe4 #f2f5f6 #f2f5f6 #d7dfe4;
padding: 8px 10px;
color: #4d4d4d;
-webkit-border-radius: 3px;
border-radius: 3px;}
._isolate label{color: #3f4b56;
font-size: 13px;
display: block;
padding: 8px 0px 3px 0px !important; font-weight: normal;}
</style>

<div class="header header_thin" >



    <!--<div class="header_title">











        <strong> International Booking </strong>



    </div>-->







</div>



<div id="middle" class="full_width ibbg">

    <div class="container clearfix">  

        <!-- content -->

        <div class="content">



            <script src="https://partners.vipcars.com/interface/?action=api&c=1719"></script><script type="text/javascript">try {

                    var j = new jsEngine();

                    j.init({affiliate: "1719", language: "en"});

                    j.loadAndExec("searchbox", "start");

                } catch (err) {

                    if (typeof console != "undefined")

                        console.log(err);

                }</script><div id="_isolate-searchboxHolder"></div>





        </div>















    </div>



    <!--/ content -->







</div>







<!--/ testimonials -->



@stop

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52669715-8', 'auto');
  ga('send', 'pageview');
</script>