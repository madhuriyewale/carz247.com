@extends('frontend.layouts.default')
<head>
<title>Book your Domestic and International Cars with Carz247</title>
<meta name="description" content="Call +91-7666947247 and book your car now! Carz247 is a car rental service that provides Self Drive Cars for all your Domestic and International Trips">
<meta name="keywords" content="self drive cars,rent car,carz247,international car booking">
<meta name="author" content="Infini Systems">
<meta charset="UTF-8">
</head>


@section('content')

<style>

    input[type=text],select{ height: 30px; }

    .vehicle_name_box {width: inherit;}

    ._isolate .content_wrapper { width: 675px; }

    #_isolate-mainHolder,.header.ui-widget-header.ui-corner-all { width: inherit; }
	._isolate #jse-sbox-container{border-radius:0px; padding: 15px 10px;}
._isolate .form_block{margin-bottom:0px;}
	._isolate #jse-sbox-submit, ._isolate .jse-listcars-select{background: #c42119 !important;
border-color: #862c28 !important;
display: block;
height: 32px;
line-height: 31px;
padding: 0 0 1px 0;
color: #fff !important;
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
border-radius:4px;
 }
 
 ._isolate #jse-sbox-container select, ._isolate #jse-sbox-container input{
 border: 1px solid;
border-color: #d7dfe4 #f2f5f6 #f2f5f6 #d7dfe4;

}
 .jse-listcars-select{display:inline-block !important; padding: 1px 15px !important; margin-right: 1px !important;}
 ._isolate h1{font-family: 'Cabin'}
 ._isolate .jse-listcars-sidebar-block{background: #e0e4e7 !important; border-radius:0px; margin-bottom: 0px;}
 .jse-listcars-sidebar-block{border-top: 1px solid #f1f1f1;}
._isolate #jse-listcars-sidebar .title, .jse-listcars-sidebar-block b{font-family: 'Cabin', sans-serif;
font-size: 14px;
line-height: 1.1em;
color: #3f4b56;
font-weight: 500;
padding: 0;
margin: 0 0 20px 0;
text-transform: uppercase;
text-shadow: 0 1px 1px #fff;}
._isolate .jse-carlist-bgicon{margin-right:5px !important;}
._isolate #jse-listcars-sidebar li{border-bottom: 1px solid #f1f1f1;}
._isolate .ui-button .ui-button-text{line-height:1.7;}
.jse-clearfix{background: none;}
._isolate .ui-widget-content{border:none; border-bottom:3px solid #ced6db; border-radius: 0px;}
._isolate .jse-listcars-car .ui-widget-header{background: none !important; color:#ed3237;}
._isolate .jse-listcars-car ._description .right .vehicle_price_box{  color:#ed3237;}
._isolate .ui-widget-content a{color:#4f5e62; font-size: 13px;}
.jse-listcars-car{margin-bottom:30px;}
._isolate #vehicle_box_price{color: #ed3237;}
._isolate #vehicle_box{background: #f1f1f1; border-radius: 0px;}
/*._isolate label{color: #3f4b56;
font-size: 13px;
display: block;
padding: 8px 0px 3px 0px !important; font-weight: normal;}

*/
#terms_box{text-align:justify;}
</style>



<div class="header listing-bg  header_thin" >







    <div class="header_title">











        <strong> International Listings </strong>



    </div>







</div>



<div id="middle" class="full_width">

    <div class="container clearfix">  

        <!-- content -->

        <div class="content">



            <script src="https://partners.vipcars.com/interface/?action=api&c=1719"></script><script type="text/javascript">try {

                    var j = new jsEngine();

                    j.init({affiliate: "1719", language: "en"});

                    j.loadAndExec("listcars", "start");

                } catch (err) {

                    if (typeof console != "undefined")

                        console.log(err);

                }</script><div id="_isolate-mainHolder"></div>





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

  ga('create', 'UA-52669715-9', 'auto');
  ga('send', 'pageview');
</script>