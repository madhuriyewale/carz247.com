 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="author" content="ThemeFuse">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Carz247 - Homepage</title>
<link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700|PT+Serif+Caption:400,400italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="{{ URL::to("public/frontend/images/favicon.ico") }}">

<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>

{{ HTML::style('public/frontend/css/style.css'); }}
{{ HTML::style('public/admin/css/font-awesome.min.css'); }}
{{ HTML::style('public/frontend/css/screen.css'); }}
{{ HTML::style('public/frontend/css/custom.css'); }}
{{ HTML::style('public/frontend/css/cusel.css'); }}
{{ HTML::style('public/frontend/rs-plugin/css/settings.css'); }}

{{ HTML::style('public/frontend/css/validationEngine.jquery.css'); }}
<link href="//code.jquery.com/ui/1.11.1/themes/pepper-grinder/jquery-ui.css" rel="stylesheet" />
<!-- main JS libs  -->
{{ HTML::script('public/frontend/js/libs/modernizr.min.js'); }}
{{ HTML::script('public/frontend/js/libs/respond.min.js'); }}
{{ HTML::script('public/frontend/js/libs/jquery.min.js'); }}

{{ HTML::script('public/frontend/js/jquery.validationEngine-en.js'); }}
{{ HTML::script('public/frontend/js/jquery.validationEngine.js'); }}




<!-- scripts  -->

<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
{{ HTML::script('public/frontend/js/jquery.easing.min.js'); }}
{{ HTML::script('public/frontend/js/general.js'); }}
{{ HTML::script('public/frontend/js/hoverIntent.js'); }}
<!-- carousel -->
{{ HTML::script('public/frontend/js/jquery.carouFredSel.min.js'); }}
{{ HTML::script('public/frontend/js/jquery.touchSwipe.min.js'); }}


{{ HTML::script('public/frontend/rs-plugin/js/jquery.themepunch.plugins.min.js'); }}
{{ HTML::script('public/frontend/rs-plugin/js/jquery.themepunch.revolution.min.js'); }}

{{ HTML::script('public/frontend/js/jquery.tools.min.js'); }}


 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script> 

 
 <script>
$(document).ready(function(){ //Run this function when the page is finished loading.
 $("form").validationEngine(); //Get the element with the id="sign-up" and run the validation plugin on it at default settings.
});
</script>