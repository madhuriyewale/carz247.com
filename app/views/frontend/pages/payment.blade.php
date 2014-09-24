@extends('frontend.layouts.default')

@section('content')





<?php 







function generateHmacKey($data, $apiKey=null){

	$hmackey = Zend_Crypt_Hmac::compute($apiKey, "sha1", $data);

	return $hmackey;

}



$action = URL::route('payment');

$flag = "";



CitrusPay::setApiKey("b45c2f0cbd9e107805ffcde3788aa039b4f3b970",'production');



//if(isset($data))

//{

	$vanityUrl = "carz247payment";

	$currency = "INR";

	$merchantTxnId = $payment['merchantTxnId'];

	$addressState = $payment['addressState'];

	$addressCity = $payment['addressCity'];

	$addressStreet1 = $payment['addressStreet1'];

	$addressCountry = $payment['addressCountry'];

	$addressZip = $payment['addressZip'];

	$firstName = $payment['firstName'];

	$lastName = $payment['lastName'];

	$phoneNumber = $payment['phoneNumber'];

	$email = $payment['email'];

	$paymentMode = $payment['paymentMode'];

	$issuerCode = $payment['issuerCode'];

	$cardHolderName = $payment['cardHolderName'];

	$cardNumber = $payment['cardNumber'];

	$expiryMonth = $payment['expiryMonth'];

	$cardType = $payment['cardType'];

	$cvvNumber = $payment['cvvNumber'];

	$expiryYear = $payment['expiryYear'];

	$returnUrl = $payment['returnUrl'];

	$notifyUrl = $payment['notifyUrl'];

	$orderAmount = $payment['orderAmount'];

	$flag = "post";

	$data1 = "$vanityUrl$orderAmount$merchantTxnId$currency";

	$secSignature = generateHmacKey($data1,CitrusPay::getApiKey());

	$action = CitrusPay::getCPBase()."$vanityUrl";  

	$time = time()*1000;

	$time = number_format($time,0,'.','');

	$templateCode = "MTT001";

	$dpFlag ='post'; 

	

//}



?>







<div class="header listing-bg header_thin">            

    <div class="header_title">

	<form action="<?php echo $action; ?>" method="POST" name="TransactionForm" id="transactionForm">



		<?php 

		if($flag == "post")

		{

			?>

		<p>

			<!--<label> Transaction ID:</label>--><input name="merchantTxnId"

				type="hidden" value="<?php echo $merchantTxnId;?>" />

		</p>

		<p>

			<!--<label> addressState:</label>--><input name="addressState" type="hidden"

				value="<?php echo $addressState;?>" />

		</p>

		<p>

			<!--<label> addressCity:</label>--><input name="addressCity" type="hidden"

				value="<?php echo $addressCity;?>" />

		</p>

		<p>

			<!--<label> addressStreet1:</label>--><input name="addressStreet1"

				type="hidden" value="<?php echo $addressStreet1;?>" />

		</p>

		<p>

			<!--<label> addressCountry:</label>--><input name="addressCountry"

				type="hidden" value="<?php echo $addressCountry;?>" />

		</p>

		<p>

			<!--<label> addressZip:</label>--><input name="addressZip" type="hidden"

				value="<?php echo $addressZip;?>" />

		</p>

		<p>

			<!--<label> firstName:</label>--><input name="firstName" type="hidden"

				value="<?php echo $firstName;?>" />

		</p>

		<p>

			<!--<label> lastName:</label>--><input name="lastName" type="hidden"

				value="<?php echo $lastName;?>" />

		</p>

		<p>

			<!--<label> Mobile Number:</label>--><input name="phoneNumber" type="hidden"

				value="<?php echo $phoneNumber;?>" />

		</p>

		<p>

			<!--<label> email:</label>--><input name="email" type="hidden"

				value="<?php echo $email;?>" />

		</p>

		<p>

			<!--<label> paymentMode:</label>--><input name="paymentMode" type="hidden"

				value="<?php echo $paymentMode;?>" />

		</p>

		<p>

			<!--<label> issuerCode:</label>--><input name="issuerCode" type="hidden"

				value="<?php echo $issuerCode;?>" />

		</p>

		<p>

			<!--<label> cardHolderName:</label>--><input name="cardHolderName"

				type="hidden" value="<?php echo $cardHolderName;?>" />

		</p>

		<p>

			<!--<label> cardNumber:</label>--><input name="cardNumber" type="hidden"

				value="<?php echo $cardNumber;?>" />

		</p>

		<p>

			<!--<label> expiryMonth:</label>--><input name="expiryMonth" type="hidden"

				value="<?php echo $expiryMonth;?>" />

		</p>

		<p>

			<!--<label> cardType:</label>--><input name="cardType" type="hidden"

				value="<?php echo $cardType;?>" />

		</p>

		<p>

			<!--<label> cvvNumber:</label>--><input name="cvvNumber" type="hidden"

				value="<?php echo $cvvNumber;?>" />

		</p>

		<p>

			<!--<label> expiryYear:</label>--><input name="expiryYear" type="hidden"

				value="<?php echo $expiryYear;?>" />

		</p>

		<p>

			<!--<label> returnUrl:</label>--><input name="returnUrl" type="hidden"

				value="<?php echo $returnUrl ?>" />

		</p>

		

		<p>

			<!--<label> notifyUrl:</label>--><input name="notifyUrl" type="hidden"

				value="<?php echo $notifyUrl;?>" />

		</p>

		

		<p>

			<!--<label> amount:</label>--><input name="orderAmount" type="hidden"

				value="<?php echo $orderAmount;?>" />

		</p>

		<p>

			<!--<label> Device Name:</label>--><input name="templateCode" type="hidden"

				value="<?php echo $templateCode;?>" />

		</p>

		<p>

			<!--Time: --><input type="hidden" name="reqtime" value="<?php echo $time;?>" />

			

			

			 <input

				type="hidden" name="secSignature"

				value="<?php echo $secSignature;?>" /> <input type="hidden"

				name="currency" value="<?php echo $currency;?>" />

		</p>

		



		<p class="clearfix"><!-- Dynamic pricing:-->

				<input type="hidden" class="text" name="dpFlag" value="<?php echo $dpFlag; ?>" />

		</p>



		<!-- Custom parameter section starts here. 

		You can omit this section if no custom parameters have been defined.

		Hidden field value should be the name of the parameter created in Checkout settings page.

		It should follow customParams[0].name, customParams[1].name .. naming convention.

		For each custom parameter created, a text field with the naming convention  

		customParams[0].value,customParams[1].value .. should be captured.

		Please refer below code snippet for passing parameters to SSL Page.

		Uncomment the for loop after the PHP tag to pass parameters to SSL Page

		

		Also refer the else part of this loop to see how to capture Custom Params on your website

		

		

		 -->

		<!-- Code for COD --> 

		<!-- <p>

			<label> COD:</label><input name="COD" type="text"

				value="<?php //echo $iscod;?>" />

		</p> -->

		<?php 

			/* for($i=0;$i<count($customParamsName);++$i)

			{

			

			echo "<p><input type=\"hidden\" name=\"customParams[$i].name\" value=\"$customParamsName[$i]\" /></p>";

			echo "<p>$customParamsName[$i]: <input type=\"text\" name=\"customParams[$i].value\" value=\"$customParamsValue[$i]\" /></p>";

			} */

		} ?>



                

              

	</form>

	

	

        <strong> 

            <i class="fa fa-car"></i> STEP 1

            <i class="fa fa-chevron-right"></i> <i class="fa fa-pencil-square-o"></i> STEP 2 

            <span><i class="fa fa-chevron-right"></i> <i class="fa fa-thumbs-up"></i> STEP 3</span>

        </strong>

    </div>

</div>

<div id="middle" class="cols2">

    <div class="container clearfix">  

        <!-- content -->

        <div class="content">

            <!-- comment form -->

            <div class="add-comment" id="addcomments">



                <div class="add-comment-title">

                    <h3>Confirm Details</h3>

                </div>





                <div class="comment-form orderInfo">

                 



                        <div class="row">

                            <p class="orderText">

                                In order to confirm your booking we will charge <strong>30%</strong> of the Base cost. <br />

                                Your Base cost is   <strong> <i class="fa fa-inr"></i>{{ number_format($listing[0]['base_cost']) }} </strong>. <br />

                                To confirm the booking we will charge you   <strong> <i class="fa fa-inr"></i>{{ number_format($bookingDetails[0]['cost']) }} </strong>. 

                            </p>

                        </div>



                        <div class="row grayBG">

                            <p class="orderDetails"><strong>Pickup time </strong><span class="colon">:</span>{{$bookingDetails[0]['pickup_time']}} </p>

                        </div>



                        <div class="clear"></div>



                        <div class="row">

                            <p class="orderDetails"><strong>Email </strong><span class="colon">:</span>{{$bookingDetails[0]['email']}}  </p>

                        </div>



                        <div class="clear"></div>



                        <div class="row grayBG">

                            <p class="orderDetails"><strong>Mobile </strong><span class="colon">:</span>{{$bookingDetails[0]['phone']}}</p>

                        </div>



                        <div class="clear"></div>  



                        <div class="row">

                            <p class="orderDetails"><strong>First Name </strong><span class="colon">:</span>{{$bookingDetails[0]['fname']}}</p>

                        </div>



                        <div class="clear"></div>  



                        <div class="row grayBG">

                            <p class="orderDetails"><strong>Last Name </strong><span class="colon">:</span>{{$bookingDetails[0]['lname']}}</p>

                        </div>



                        <div class="clear"></div>  



                        <div class="row">

                            <p class="orderDetails"><strong>Locality </strong><span class="colon">:</span>{{$bookingDetails[0]['locality']}} </p>

                        </div>



                        <div class="clear"></div> 



                        <div class="row grayBG">

                            <p class="orderDetails"><strong>zipcode </strong><span class="colon">:</span>{{$bookingDetails[0]['zipcode']}}</p>

                        </div>



                        <div class="clear"></div> 



                        <div class="row">

                            <p class="orderDetails"><strong>Address </strong><span class="colon">:</span>{{$bookingDetails[0]['address']}}</p>

                        </div>



                        <div class="clear"></div> 



                        <div class="row grayBG">

                            <p class="orderDetails"><strong>Instructions </strong><span class="colon">:</span>{{$bookingDetails[0]['instructions']}}</p>

                        </div>



                        <div class="clear"></div> 



                          <input type="button" value="GO BACK" class="btn btn-submit m10" onclick="window.history.go(-1);" >   

          <input type="button" id="button-pay" value="PAY NOW" class="btn btn-submit m10 pull-right">  

                    

                </div>

            </div>

        </div>

        <!--/ content --> 



        <!-- sidebar -->



        <div class="sidebar">

            <div class="box">

                <!-- widget_categories -->

                <h3 class="widget-title mb0 padding15 pb0">Booking Summary</h3>



                <h4 class="mb0 padding15"> <i class="fa {{ $listing[0]['service_id'] == 1 ? "fa-map-marker" : $listing[0]['service_id'] == 3 ? "fa-plane" : "fa-tachometer" }}"></i> {{ $listing[0]['service'] }}</h4>

                <div class="widget-container widget_popular">

                <!--    <img src="http://carz247.com/images/compact_2.jpg"> -->



                    {{ HTML::image('public/frontend/images/car-uploads/'.$listing[0]['image'],'', array()) }}

                    <div class="booking_sum"><span>Car Category: </span> {{ $listing[0]['category'] }}</div>

                    <div class="booking_sum"><span>Location: </span>{{ $listing[0]['city'] }}</div>

                    <div class="booking_sum"><span>{{ $listing[0]['service_id'] == 2 ? "On" : "From" }}: </span>{{ Session::get('fromDate') }}</div>

                    @if($listing[0]['service_id'] == 2)<div class="booking_sum"><span>To :</span>{{ Session::get('toDate') }}</div> @endif

                    <div class="booking_sum"><span>Base Cost: </span> <i class="fa fa-inr"></i> {{ number_format($listing[0]['base_cost']) }}</div>

                </div>

                <div class="widget-container widget_tag_cloud">	        	

                    <h3 class="widget-title">Inclusions:</h3>

                    <div class="tagcloud">

                        <div class="booking_sum"><span>Kilometers: </span>{{ $listing[0]['min_kms'] }} Kms</div>

                        @if($listing[0]['service_id'] == 2) <div class="booking_sum"><span>No Of Days: {{ $days }} </span></div> @endif

                        @if($listing[0]['service_id'] != 2) <div class="booking_sum"><span>Hours: </span>{{ $listing[0]['min_hrs'] }} Hrs</div> @endif

                        <div class="booking_sum"><span>Chauffeur</span></div>

                    </div>

                </div>  

                <div class="widget-container widget_archive">

                    <h3 class="widget-title">Exclusions</h3>		

                    <div class="tagcloud">

                        <div class="booking_sum"><span>Service Tax, Toll, Parking  </span></div>

                        <div class="booking_sum"><span>Extra Km beyond {{ $listing[0]['min_kms'] }} Km: </span> <i class="fa fa-inr"></i> {{ $listing[0]['extra_km_cost'] }} per Km.</div>

                        @if($listing[0]['service_id'] != 2) <div class="booking_sum"><span>Extra Hours beyond {{ $listing[0]['min_hrs'] }} hrs: </span> <i class="fa fa-inr"></i> {{ $listing[0]['extra_hr_cost'] }} per Hr</div> @endif

                    </div>

                </div>

                <div class="box_bot"></div>

            </div>



        </div>

        <!--/ sidebar -->  

    </div>

    <!--/ content -->

</div>

                            

                             <script type="text/javascript">

    	$('#button-pay').click(function() { 

            $("#transactionForm").submit();

        });

     

	</script>

@stop