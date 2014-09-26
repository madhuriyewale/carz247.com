

<div class="header listing-bg  header_thin" >

    <div class="header_title">
        <h1> <span>Invoice</span></h1>
    </div>

</div>

<div id="middle" class="full_width">
    <div class="container clearfix">  

        <!-- content -->
        <!--        <div class="content">            -->

        <div class="entry">

            <div class="col">

                <?php
               // echo print_r($response_data);

                //$data =  Session::all();
                //echo  print_r($data);
                ?>



                @if($response_data['TxStatus']=='SUCCESS')

                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e1e1e1;margin:10px 0; background:#fff;" class="second">
                    <style>
                        td{padding:5px 5px 5px 10px;font-size:12px;}table.second td{border-bottom:1px solid #e1e1e1;}
                    </style>


                    @if($listings_data['service']=='Local'  || $listings_data['service']=='Airport Transfer')
                    <tr style="background:#F3F2F2;">
                        <td colspan="2"><h5 class="mb0">Booking Type: <strong>{{$listings_data['service']; }}</strong>  for  </h5></td> <td colspan="2"><h5 class="mb0">Transaction ID: {{ $response_data['TxId'] }}</h5></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>From: {{$listings_data['city']; }}</strong></td>
                        <td colspan="2">  <strong>On: {{ Session::get('fromDate'); }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Time: {{$booking_data[0]['pickup_time'] }} </strong></td>
                        <td colspan="2">  <strong>Locality:{{ $response_data['addressStreet1']}} </strong></td>
                    </tr>
                    @endif
                    @if($listings_data['service']=='Outstation') 
                    <tr>
                        <td colspan="2"><h5 class="mb0">Booking Type: <strong>{{$listings_data['service']; }}</strong>   </h5></td> <td colspan="2"><h5 class="mb0">Transaction ID: {{ $response_data['TxId'] }}</h5></td>

                    </tr>

                    <tr>
                        <td colspan="2"><strong>From: {{$listings_data['city']; }}</strong></td>
                        <td style="vertical-align:top;" colspan="2"> <strong>To:{{ Session::get('toCity'); }} </strong></td>
                    </tr>
                    <tr>
                        <td colspan="2">  <strong>On: {{ Session::get('fromDate'); }} </strong></td>
                        <td colspan="2">  <strong>Till Date: {{ Session::get('toDate'); }} </strong></td>
                    </tr>  
                    <tr> 
                        <?php
                        $start_date = Session::get('fromDate');
                        $end_date = Session::get('toDate');

                        $no_of_days = ((strtotime($end_date) - strtotime($start_date)) / 3600) + 1;
                        ?>
                        <td style="vertical-align:top;" colspan="2"> <strong>For: {{ $no_of_days; }}</strong></td>
                        <td style="vertical-align:top;" colspan="2"> <strong>Locality: {{ $booking_data[0]['locality']; }} </strong></td>

                    </tr>
                    @endif

                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e1e1e1;margin:10px 0; background:#fff;" class="second">
                    <tr style="background:#F3F2F2;">

                        <td style="vertical-align:top;">Car Category</td>
                        <td>Base Cost</td>
                        <td>Extra Charges</td>
                        <td style="vertical-align:top;" >Total</td>

                    </tr>
                    <tr >
                        <td>{{ $listings_data['category'] }}</td>
                        <td>{{ Session::get('baseCost');}}</td>
                        <td></td>
                        <td ><strong>{{ Session::get('baseCost');}}</strong></td>

                    </tr>
                    <tr>
                        <td colspan="3"><strong>Tax</strong></td>
                        <td colspan="1"><strong>-</strong></td>
                    </tr>

                    <tr>
                        <td colspan="3"><strong>Discount</strong></td>
                        <td colspan="1"><strong>-</strong></td>
                    </tr>


                    <tr>
                        <td colspan="3"><strong>AmountPaid</strong></td>
                        <td colspan="1"><strong> <strong><?php //echo $amount; ?>{{ $booking_data[0]['cost'];}}</strong></strong></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Amount payable</strong></td>
                        <td colspan="1"><strong> <strong>{{ Session::get('baseCost') - $booking_data[0]['cost'] }}</strong></strong></td>
                    </tr>




                </table>  
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e1e1e1;margin:10px 0; background:#fff;" class="second">
                    <tr style="background:#F3F2F2;">
                        <td ><strong>Inclusions</strong></td>
                        <td><strong>Exclusions</strong></td>
                    </tr>

                    <tr>
                        <td ><strong>Kilometers: {{ $booking_data[0]['min_kms'];}} </strong></td>
                        <td ><strong>Extra Kilometers: {{ $booking_data[0]['extra_km_cost'];}} </strong></td>
                    </tr>
                    <tr>
                        <td ><strong>Hours: {{ $booking_data[0]['min_hrs'];}}  </strong></td>
                        <td ><strong>Extra Hours:  {{ $booking_data[0]['extra_hr_cost'];}}  </strong></td>
                    </tr>

                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e1e1e1;">
                    <tr>
                        <td><strong> Cancel & refund policy:</strong> </td>
                    </tr>
                    <tr>

                        <td> 1. If the booking is cancelled 48 Hrs prior to the pickup time - 100% refund will be provided</td>
                    </tr>
                    <tr>

                        <td>2. In case of No Show, No Refund will be provided</td>
                    </tr>
                    <tr>

                        <td>3.  If the booking is cancelled within 48 Hrs prior to the pickup time then following rules will
                            apply:
                            <ul>
                                <li>Local: No Refund will be provided</li>
                                <li>Outstation: The charge for the first day would be deducted from the total amount and refund will be provided</li>
                            </ul>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td><span style="font-size:10px !important;">
                                * For any queries you may contact us on 7666 947 247</span><br/>
                            <br/></td>
                    </tr>
                </table> 
                @else
                <table>
                    <tr>
                        <td><span style="font-size:10px !important;">
                                <h3> Sorry seem something went wrong! Please contact us on 7666 947 247 and we will fix the issue right away</span><br/>
                        </h3><br/></td>
                    </tr>
                </table> 
                @endif
                <?php Session::forget('booking_id');?>




            </div>
        </div>
    </div>
    <!--        </div>-->
</div>

