
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            p{
                margin: 0px;
                line-height: 2em;
            }
            #wrapper{
                width: 960px;
                margin: auto;
                font-family: verdana;
            }
            header{
                text-align: center;
                padding: 20px;
            }
            div#info div {
                width: 47%;
                margin-bottom: 40px;
                border: 2px solid;
                padding: 10px;
                font-weight: bold;
                min-height: 135px;
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
                border: 2px solid;
                padding: 10px;
            }
            .cnt{
                text-align: center;
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

            td:nth-child(5) {text-align: right;}

            [contenteditable="true"]:hover { outline: 2px dashed #0090D2; }

        </style>
    </head>
    <body>
        <a href="javascript:window.print()">Click to Print This Page</a>
        <div id="wrapper" contenteditable="true">
            <header>
                {{ HTML::image('public/admin/img/carzInvoice.png') }}
            </header>
            <div id="info">
                <div id="rtInfo">
                    <p>Client:{{ $bookingData[0]['fname']; }} {{ $bookingData[0]['lname']; }}</p>  
                    <p>{{ $bookingData[0]['city'];  }}</p>
                    <p>
                        <span class="slp">Duty Slip No: {{ $bookingData[0]['id'];  }}</span>
                    </p>
                </div>
                <div id="ltInfo">
                    <p>Invoice No: {{ $bookingData[0]['id'];  }}</p>
                    <p>Date: <?php echo date('d-m-Y'); ?></p>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Particulars</th>
                        <th>KMS</th>
                        <th>HOURS/DAYS</th>
                        <th>AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cnt">{{ $recieptCnt }}</td>
                        <td>{{ $recieptCont }}</td>
                        <td class="cnt">{{ number_format($kms) }}</td>
                        <td class="cnt">{{ $hours }}</td>
                        <td class="cnt">{{ number_format($amount) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Extras</td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($extra) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Discount</td>
                        <td></td>
                        <td></td>
                        <td> - {{ number_format($discount) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Service Tax</td>
                        <td></td>
                        <td></td>
                        <td>{{ $st }}%</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Booking Amount</td>
                        <td></td>
                        <td></td>
                        <td> - {{ number_format($prepaid) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td>{{ number_format($finalAmnt) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                No disputes or objections will be entertained if not brought <br />
                                to our notice within Three days from now here of subject to <br />
                                Mumbai Jurisdiction.
                            </p>

                        </td>
                        <td colspan="3" rowspan="2" style="vertical-align: bottom;">
                            <p style="text-align: right;font-weight: bold;">FOR CARZ247 SOLUTIONS PVT. LTD</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                Service Tax and Education Cess Leviable as per Regulation.  
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </body>
</html>