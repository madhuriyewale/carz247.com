<!DOCTYPE html>

<html>

    <head> 

        <title></title>

        <style>

            p{

                margin: 0px;

                line-height: 2em;
                background: #ededed;
                margin: 5px 0px;
                padding-left: 10px; 
                font-size:15px;

            }

            #wrapper{

                width: 960px;

                margin: auto;

                font-family: verdana;

                border: 1px solid #ccc;

            }

            header{

                text-align: center;

                padding: 20px;

                /*				background: #ededed;
                */
            }

            div#info div {

                width: 49.5%;

                margin-bottom: 10px;

                /*border: 2px solid;

                padding: 10px;

                font-weight: bold;

                min-height: 135px;*/

            }

            div#rtInfo {

                float: left;

                margin-right: 9px;

            }



            div#ltInfo {

                float: right;

            }

            table {

                clear: both;

                width: 100%;

                border-collapse: collapse;

            }

            th, td {

                border: 1px solid #ccc;

                padding: 10px;

                font-size:14px;

            }

            .cnt{

                text-align: center;

            }
            .btn{display: inline-block;
                 padding: 6px 12px;
                 margin-bottom: 0;
                 font-size: 14px;
                 font-weight: normal;
                 line-height: 1.428571429;
                 text-align: center;
                 white-space: nowrap;
                 vertical-align: middle;
                 cursor: pointer;
                 background-image: none;
                 text-decoration:none;
                 color:#fff;
                 font-family: verdana;
            }
            .btn.btn-default:hover, .btn.btn-default:active, .btn.btn-default.hover{background-color: #367fa9 !important;}
            .btn.btn-default {
                background-color: #3c8dbc;
                color: #fff;
                border-color: #367fa9 ;
                border-bottom-color: #ddd;
                border-radius: 3px;
            }




            @media print {

                body * {

                    visibility: hidden;

                }

                #wrapper, #wrapper * {

                    visibility: visible;

                }

                #wrapper {

                    position: absolute;

                    left: 0;

                    top: 0;

                }

            }



            td:nth-child(4) {text-align: right;}



            [contenteditable="true"]:hover { outline: 2px dashed #0090D2; }



        </style>

    </head>

    <body>

        <a class="btn btn-default" href="javascript:window.print()"> <i class="fa fa-print"></i> Click to Print This Page</a>

        <div id="wrapper" >

            <header>

                <h1>{{ $bookingData[0]['venders_name']; }}</h1>

            </header>

            <div id="info">

                <div id="rtInfo">
                    <p style="border-left: 1px solid #ccc;">Invoice No: <strong> {{ $bookingData[0]['id'];  }} </strong></p>

                    <p style="border-left: 1px solid #ccc;">

                        <span class="slp">Duty Slip No: {{ $bookingData[0]['id'];  }}</span>

                    </p>

                    <p style="border-left: 1px solid #ccc;">Date: <?php echo date('d-m-Y'); ?></p>



                </div>

                <div id="ltInfo">

                    <p>Client: <strong> {{ $bookingData[0]['fname']; }} {{ $bookingData[0]['lname']; }} </strong></p>  

                    <p>City: {{ $bookingData[0]['city'];  }}</p>

                </div>

            </div>

            <table>

                <thead>

                    <tr style="background:#ededed;">

                        <th>PARTICULARS</th>

                        <th>KMS</th>

                        <th>HOURS/DAYS</th>

                        <th>AMOUNT</th>

                    </tr>

                </thead>

                <tbody>



                    {{ $recieptCont }}

                    <tr>

                        <td>Toll Charges</td>

                        <td></td>

                        <td></td>

                        <td>{{ @number_format($toll) }}</td>

                    </tr>

                    <tr>

                        <td>Permit Charges</td>

                        <td></td>

                        <td></td>

                        <td>{{ @number_format($permit) }}</td>

                    </tr>

                    <tr>

                        <td>Parking Charges</td>

                        <td></td>

                        <td></td>

                        <td>{{ @number_format($parking) }}</td>

                    </tr>

                    <tr>

                        <td>Extra Charges {{ ($bookingData[0]['vendor_remarks'])=="" ? "":"(".($bookingData[0]['vendor_remarks']).")"; }}</td>

                        <td></td>

                        <td></td>

                        <td>{{ @number_format($extra) }}</td>

                    </tr>

                    <tr>

                        <td>Discount</td>

                        <td></td>

                        <td></td>

                        <td> - {{ @number_format($discount) }}</td>

                    </tr>

                    <tr style="background:#ededed;">

                        <td><strong>Total</strong></td>

                        <td></td>

                        <td></td>

                        <td><strong>{{ @number_format($finalAmntNoST) }}</strong></td>

                    </tr>

                    <tr>

                        <td>Service Tax</td>

                        <td></td>

                        <td></td>

                        <td>{{ @$st }}%</td>

                    </tr>

                    <tr>

                        <td>Booking Amount</td>

                        <td></td>

                        <td></td>

                        <td> - {{ @number_format($prepaid) }}</td>

                    </tr>

                    <tr style="background:#ededed;">

                        <td><strong>Grand Total</strong></td>

                        <td></td>

                        <td></td>

                        <td><strong>{{ @number_format($finalAmnt) }}</strong></td>

                    </tr>

                    <tr>

                        <td>

                            <p style="background: none;">

                                No disputes or objections will be entertained if not brought 

                                to our notice within <br/>Three days from now here of subject to 

                                Mumbai Jurisdiction.

                            </p>



                        </td>

                        <td colspan="3" rowspan="2" style="vertical-align: bottom;">

                            <p style="text-align: center;font-weight: bold; background:none;">FOR {{ $bookingData[0]['venders_name']; }}</p>

                        </td>

                    </tr>

                    <tr>

                        <td>

                            <p style="background: none;">

                                Service Tax and Education Cess Leviable as per Regulation.  

                            </p>

                        </td>

                    </tr>

                </tbody>

            </table>



        </div>

    </body>

</html>