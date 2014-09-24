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
            <link rel='stylesheet' type='text/css' href='https://admin.citruspay.com/resources/admin/css/Insta-Buy.css'/>
            <script type='text/javascript' src='https://admin.citruspay.com/resources/admin/js/Insta-Buy.js'></script>
            <form action='https://www.citruspay.com/carz247payment' method='post'>
                <input type='hidden' name='productSKU' value='Carz247'>
                <input type='hidden' name='productName' value='Carz247'>
                <input type='hidden' name='orderAmount' value='50880'>
                <input type='hidden' name='' value=''>
                <input type='hidden' name='' value=''>
                <input type='hidden' name='' value=''>
                <input type='hidden' name='secSignature' value='e8237f01d50af76786aa647eb6a08dc8346bef8d' />
                <input type='hidden' name='oneClickBuy' value='true'>
                <input type='hidden' id='buyNowCitrusLogo' value='https://admin.citruspay.com/resources/admin/images/logo_citrus-med.png'>
                <input type='hidden' name='customAttributeNames' value='--'>
                <div style='width: 100px; text-align: center;'>
                    <input type='image' alt='Buy Now' border='0' src='https://admin.citruspay.com/resources/admin/images/btn_buyNow.png' /><br/>
                    
                </div><div id='citrusInstaBuyOverlayWrapper'></div>
            </form>   
        </div>
    </div>
</div>
@stop