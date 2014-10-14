@extends('frontend.layouts.default')
@section('content')
<div class="header listing-bg header_thin">            
    <div class="header_title">
        <strong>Quick Pay </strong>
    </div>
</div>
<div id="middle" class="cols2">
    <div class="container clearfix">  
        <!-- content -->
        <div class="content">
            <link rel='stylesheet' type='text/css' href='https://admin.citruspay.com/resources/admin/css/Insta-Buy.css'/><script type='text/javascript' src='https://admin.citruspay.com/resources/admin/js/Insta-Buy.js'></script><form action='https://www.citruspay.com/carz247payment' method='post'>
                <input type='hidden' name='productSKU' value='Carz'>
                <input type='hidden' name='productName' value='Carz'>
                <input type='hidden' name='orderAmount' value='106000'>
                <input type='hidden' name='' value=''>
                <input type='hidden' name='' value=''>
                <input type='hidden' name='' value=''>
                <input type='hidden' name='secSignature' value='52e6e26d29eb921416efdb6262bbdfd00229bd08' />
                <input type='hidden' name='oneClickBuy' value='true'>
                <input type='hidden' id='buyNowCitrusLogo' value='https://admin.citruspay.com/resources/admin/images/logo_citrus-med.png'>
                <input type='hidden' name='customAttributeNames' value='--'>
                <div style='width: 100px; text-align: center;'><input type='image' alt='Buy Now' border='0' src='https://admin.citruspay.com/resources/admin/images/btn_buyNow.png' /><br/><a style='text-decoration: none; color: rgb(153, 153, 153); font-family: Arial,Helvetica,sans-serif; font-size: 13px; padding-top: 10px; line-height: 25px;' href='javascript:;' onclick='citrusInstaBuyWhatsThis();'>What's this?</a></div><div id='citrusInstaBuyOverlayWrapper'></div>
            </form>   
        </div>
    </div>
</div>
@stop