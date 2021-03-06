<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
{{ HTML::script('public/admin/js/bootstrap.min.js'); }}
<!-- Bootstrap -->
{{ HTML::script('public/admin/js/jquery.validate.js'); }}
<!-- Datatables -->
{{ HTML::script('public/admin/js/plugins/datatables/jquery.dataTables.js'); }}
{{ HTML::script('public/admin/js/plugins/datatables/dataTables.bootstrap.js'); }}

<!-- AdminLTE App -->
{{ HTML::script('public/admin/js/AdminLTE/app.js'); }}


<script>
$(function() {

    $("form").validate();

     var dtable = $('#listingTables').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "aaSorting": []
    });

    var oTable = $('#OrdersTables').dataTable({
        "aaSorting": []
    });


    $("table#OrdersTables th:nth-child(6),table#OrdersTables td:nth-child(6)").hide();
    $("table#OrdersTables th:nth-child(8),table#OrdersTables td:nth-child(8)").hide();
    $("table#OrdersTables th:nth-child(9),table#OrdersTables td:nth-child(9)").hide();
    $("table#OrdersTables th:nth-child(10),table#OrdersTables td:nth-child(10)").hide();
    $("table#OrdersTables th:nth-child(11),table#OrdersTables td:nth-child(11)").hide();
    $("table#OrdersTables th:nth-child(13),table#OrdersTables td:nth-child(13)").hide();
    $("table#OrdersTables th:nth-child(14),table#OrdersTables td:nth-child(14)").hide();
    $("table#OrdersTables th:nth-child(15),table#OrdersTables td:nth-child(15)").hide();
    $("table#OrdersTables th:nth-child(18),table#OrdersTables td:nth-child(18)").hide();
    $("table#OrdersTables th:nth-child(19),table#OrdersTables td:nth-child(19)").hide();
    $("table#OrdersTables th:nth-child(20),table#OrdersTables td:nth-child(20)").hide();
    $("table#OrdersTables th:nth-child(21),table#OrdersTables td:nth-child(21)").hide();
    $("table#OrdersTables th:nth-child(22),table#OrdersTables td:nth-child(22)").hide();
    $("table#OrdersTables th:nth-child(23),table#OrdersTables td:nth-child(23)").hide();
    $("table#OrdersTables th:nth-child(24),table#OrdersTables td:nth-child(24)").hide();
    $("table#OrdersTables th:nth-child(25),table#OrdersTables td:nth-child(25)").hide();
    $("table#OrdersTables th:nth-child(26),table#OrdersTables td:nth-child(26)").hide();
    $("table#OrdersTables th:nth-child(27),table#OrdersTables td:nth-child(27)").hide();
    $("table#OrdersTables th:nth-child(28),table#OrdersTables td:nth-child(28)").hide();
    $("table#OrdersTables th:nth-child(29),table#OrdersTables td:nth-child(29)").hide();
    $("table#OrdersTables th:nth-child(30),table#OrdersTables td:nth-child(30)").hide();
    $("table#OrdersTables th:nth-child(31),table#OrdersTables td:nth-child(31)").hide();
    $("table#OrdersTables th:nth-child(32),table#OrdersTables td:nth-child(32)").hide();
    $("table#OrdersTables th:nth-child(33),table#OrdersTables td:nth-child(33)").hide();
    $("table#OrdersTables th:nth-child(34),table#OrdersTables td:nth-child(34)").hide();
    $("table#OrdersTables th:nth-child(35),table#OrdersTables td:nth-child(35)").hide();
    $("table#OrdersTables th:nth-child(36),table#OrdersTables td:nth-child(36)").hide();
    $("table#OrdersTables th:nth-child(37),table#OrdersTables td:nth-child(37)").hide();
    $("table#OrdersTables th:nth-child(38),table#OrdersTables td:nth-child(38)").hide();
    $("table#OrdersTables th:nth-child(39),table#OrdersTables td:nth-child(39)").hide();



    oTable.on('draw', function() {
        $("table#OrdersTables th:nth-child(6),table#OrdersTables td:nth-child(6)").hide();
        $("table#OrdersTables th:nth-child(8),table#OrdersTables td:nth-child(8)").hide();
        $("table#OrdersTables th:nth-child(9),table#OrdersTables td:nth-child(9)").hide();
        $("table#OrdersTables th:nth-child(10),table#OrdersTables td:nth-child(10)").hide();
        $("table#OrdersTables th:nth-child(11),table#OrdersTables td:nth-child(11)").hide();
        $("table#OrdersTables th:nth-child(13),table#OrdersTables td:nth-child(13)").hide();
        $("table#OrdersTables th:nth-child(14),table#OrdersTables td:nth-child(14)").hide();
        $("table#OrdersTables th:nth-child(15),table#OrdersTables td:nth-child(15)").hide();
        $("table#OrdersTables th:nth-child(18),table#OrdersTables td:nth-child(18)").hide();
        $("table#OrdersTables th:nth-child(19),table#OrdersTables td:nth-child(19)").hide();
        $("table#OrdersTables th:nth-child(20),table#OrdersTables td:nth-child(20)").hide();
        $("table#OrdersTables th:nth-child(21),table#OrdersTables td:nth-child(21)").hide();
        $("table#OrdersTables th:nth-child(22),table#OrdersTables td:nth-child(22)").hide();
        $("table#OrdersTables th:nth-child(23),table#OrdersTables td:nth-child(23)").hide();
        $("table#OrdersTables th:nth-child(24),table#OrdersTables td:nth-child(24)").hide();
        $("table#OrdersTables th:nth-child(25),table#OrdersTables td:nth-child(25)").hide();
        $("table#OrdersTables th:nth-child(26),table#OrdersTables td:nth-child(26)").hide();
        $("table#OrdersTables th:nth-child(27),table#OrdersTables td:nth-child(27)").hide();
        $("table#OrdersTables th:nth-child(28),table#OrdersTables td:nth-child(28)").hide();
        $("table#OrdersTables th:nth-child(29),table#OrdersTables td:nth-child(29)").hide();
        $("table#OrdersTables th:nth-child(30),table#OrdersTables td:nth-child(30)").hide();
        $("table#OrdersTables th:nth-child(31),table#OrdersTables td:nth-child(31)").hide();
        $("table#OrdersTables th:nth-child(32),table#OrdersTables td:nth-child(32)").hide();
        $("table#OrdersTables th:nth-child(33),table#OrdersTables td:nth-child(33)").hide();
        $("table#OrdersTables th:nth-child(34),table#OrdersTables td:nth-child(34)").hide();
        $("table#OrdersTables th:nth-child(35),table#OrdersTables td:nth-child(35)").hide();
        $("table#OrdersTables th:nth-child(36),table#OrdersTables td:nth-child(36)").hide();
        $("table#OrdersTables th:nth-child(37),table#OrdersTables td:nth-child(37)").hide();
        $("table#OrdersTables th:nth-child(38),table#OrdersTables td:nth-child(38)").hide();
        $("table#OrdersTables th:nth-child(39),table#OrdersTables td:nth-child(39)").hide();
    });
    
    
     var vTable = $('#vendorTables').dataTable({
        "aaSorting": []
    });
   // $("table#vendorTables th:nth-child(2),table#vendorTables td:nth-child(2)").hide();
    $("table#vendorTables th:nth-child(3),table#vendorTables td:nth-child(3)").hide();
    $("table#vendorTables th:nth-child(4),table#vendorTables td:nth-child(4)").hide();
    $("table#vendorTables th:nth-child(5),table#vendorTables td:nth-child(5)").hide();
    $("table#vendorTables th:nth-child(6),table#vendorTables td:nth-child(6)").hide();
    $("table#vendorTables th:nth-child(7),table#vendorTables td:nth-child(7)").hide();
    $("table#vendorTables th:nth-child(8),table#vendorTables td:nth-child(8)").hide();
    $("table#vendorTables th:nth-child(13),table#vendorTables td:nth-child(13)").hide();
    $("table#vendorTables th:nth-child(14),table#vendorTables td:nth-child(14)").hide();


    vTable.on('draw', function() {
      //  $("table#vendorTables th:nth-child(2),table#vendorTables td:nth-child(2)").hide();
        $("table#vendorTables th:nth-child(3),table#vendorTables td:nth-child(3)").hide();
        $("table#vendorTables th:nth-child(4),table#vendorTables td:nth-child(4)").hide();
        $("table#vendorTables th:nth-child(5),table#vendorTables td:nth-child(5)").hide();
        $("table#vendorTables th:nth-child(6),table#vendorTables td:nth-child(6)").hide();
        $("table#vendorTables th:nth-child(7),table#vendorTables td:nth-child(7)").hide();
        $("table#vendorTables th:nth-child(8),table#vendorTables td:nth-child(8)").hide();
        $("table#vendorTables th:nth-child(13),table#vendorTables td:nth-child(13)").hide();
        $("table#vendorTables th:nth-child(14),table#vendorTables td:nth-child(14)").hide();



    });

});
</script>

<script>

    $(document).ready(function() {
 
//cities Edit
        $(document).on("click", ".citiesEdit", function() {
            var id = $(this).attr('data-id');
            $("form#citiesForm input[name='city']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            var optValue = $.trim($("tr[data-tr='" + id + "'] td").eq(2).text());
            var chkValue = "Yes";
            if (optValue == chkValue) {
                $('#optionsRadios1').parent('div').addClass('checked');
                $('#optionsRadios2').parent('div').removeClass('checked');
            } else {
                $('#optionsRadios1').parent('div').removeClass('checked');
                $('#optionsRadios2').parent('div').addClass('checked');
            }

            $("form#citiesForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#citiesForm").attr("action", "{{ URL::route('cities_edit') }}");
        });
        //package Edit

        $(document).on("click", ".packageEdit", function() {
            var id = $(this).attr('data-id');
            $("form#packageForm input[name='package']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            var optValue = $.trim(($("tr[data-tr='" + id + "'] td").eq(2).text()));
            var chkValue = "Yes";
            if (optValue == chkValue) {
                $('#optionsRadios1').parent('div').addClass('checked');
                $('#optionsRadios2').parent('div').removeClass('checked');
            }
            else {
                $('#optionsRadios2').parent('div').addClass('checked');
                $('#optionsRadios1').parent('div').removeClass('checked');
            }
            $("form#packageForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#packageForm").attr("action", "{{ URL::route('package_edit') }}");
        });

        //service Edit

        $(document).on("click", ".serviceEdit", function() {
            var id = $(this).attr('data-id');
            $("form#serviceForm input[name='service']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            var optValue = $.trim($("tr[data-tr='" + id + "'] td").eq(2).text());
            var chkValue = "Yes";
            if (optValue == chkValue) {
                // alert("yes");
                $('#serviceoptionsRadios1').parent('div').addClass('checked');
                $('#serviceoptionsRadios2').parent('div').removeClass('checked');
            } else {
                //  alert("no");
                $('#serviceoptionsRadios1').parent('div').removeClass('checked');
                $('#serviceoptionsRadios2').parent('div').addClass('checked');
            }
            $("form#serviceForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#serviceForm").attr("action", "{{ URL::route('service_edit') }}");
        });

        //locality Edit
        $(document).on("click", ".localityEdit", function() {
            var id = $(this).attr('data-id');
            $("form#localityForm select[name='city'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(1).attr("data-value") + "']").prop('selected', true);
            $("form#localityForm input[name='locality']").val($("tr[data-tr='" + id + "'] td").eq(2).text());
            $("form#localityForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#localityForm").attr("action", "{{ URL::route('locality_edit') }}");
        });

        //testimonials Edit
        $(document).on("click", ".testimonialEdit", function() {
            var id = $(this).attr('data-id');
            $("form#testimonialForm input[name='testimonial']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            $("form#testimonialForm input[name='from']").val($("tr[data-tr='" + id + "'] td").eq(2).text());
            $("form#testimonialForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#testimonialForm").attr("action", "{{ URL::route('testimonial_edit') }}");
        });

        //vender Edit
         $(document).on("click", ".venderEdit", function() {
            var id = $(this).attr('data-id');
            $("form#venderForm input[name='vendersName']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            $("form#venderForm select[name='cityName'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(2).attr("data-value") + "']").prop('selected', true);
            //$("form#venderForm select[name='cityName']").val($("tr[data-tr='" + id + "'] td").eq(2).text());
            // $("form#venderForm select[name='cityName'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(2).attr("data-value") + "']").prop('selected', true);

            $("form#venderForm input[name='address']").val($("tr[data-tr='" + id + "'] td").eq(3).text());
            $("form#venderForm input[name='zone']").val($("tr[data-tr='" + id + "'] td").eq(4).text());
            var e = "";
            $("tr[data-tr='" + id + "'] td").eq(5).children("ol").children("li").each(function() {
                e = e + $.trim($(this).text()) + ",";
            });
            $("form#venderForm input[name='mobileNo']").val(e.slice(0, -1));
            $("form#venderForm input[name='tanNo']").val($("tr[data-tr='" + id + "'] td").eq(6).text());
            $("form#venderForm input[name='panNo']").val($("tr[data-tr='" + id + "'] td").eq(7).text());
            var e = "";
            $("tr[data-tr='" + id + "'] td").eq(8).children("ol").children("li").each(function() {
                e = e + $.trim($(this).text()) + ",";
            });
            $("form#venderForm input[name='drivers']").val(e.slice(0, -1));
            var e = "";
            $("tr[data-tr='" + id + "'] td").eq(9).children("ol").children("li").each(function() {
                e = e + $.trim($(this).text()) + ",";
            });
            $("form#venderForm input[name='cars']").val(e.slice(0, -1));

            $("form#venderForm input[name='venderContactName']").val($("tr[data-tr='" + id + "'] td").eq(10).text());
            $("form#venderForm input[name='altContactNo']").val($("tr[data-tr='" + id + "'] td").eq(11).text());

            $("form#venderForm input[name='serviceTaxNo']").val($("tr[data-tr='" + id + "'] td").eq(12).text());
            $("form#venderForm input[name='emailId']").val($("tr[data-tr='" + id + "'] td").eq(13).text());

            var e = "";
            $("tr[data-tr='" + id + "'] td").eq(14).children("ol").children("li").each(function() {
                e = e + $.trim($(this).text()) + ",";
            });
            $("form#venderForm input[name='carNumbers']").val(e.slice(0, -1));
            if ($("tr[data-tr='" + id + "'] td").eq(16).text() != "") {
                var e = "";
                $("tr[data-tr='" + id + "'] td").eq(16).children("ol").children("li").each(function() {
                    e = $.trim($(this).attr("data-value"));

                    if (e == 0) {
                        $('#chk0').parent('div').addClass('checked').attr("aria-checked", true);
                        $('#chk0').attr("checked", "checked");
                    }

                    if (e == 1) {
                        $('#chk1').parent('div').addClass('checked').attr("aria-checked", true);
                        $('#chk1').attr("checked", "checked");
                    }

                    if (e == 2) {
                        $('#chk2').parent('div').addClass('checked').attr("aria-checked", true);
                        $('#chk2').attr("checked", "checked");

                    }
                    if (e == 3) {
                        $('#chk3').parent('div').addClass('checked').attr("aria-checked", true);
                        $('#chk3').attr("checked", "checked");
                    }
                    if (e == 4) {
                        $('#chk4').parent('div').addClass('checked').attr("aria-checked", true);
                        $('#chk4').attr("checked", "checked");
                    }

                });

            }

            var e = "";
            $("tr[data-tr='" + id + "'] td").eq(15).children("ol").children("li").each(function() {
                e = $.trim($(this).text());
                $(".doc").append("<p><ol><li type='disc'><a  href='/public/admin/uploads/vendor-uploads/" + e + "' target='_blank'>" + e + "</a></li></ol></p>");

            });

            $("form#venderForm checkbox[name='chk[]']").parent('div').addClass('checked');
            $("form#venderForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#venderForm").attr("action", "{{ URL::route('vender_edit')}}");
        });  
    });
    //category Edit

    $(document).on("click", ".categoryEdit", function() {
        var id = $(this).attr('data-id');
        $("form#categoryForm input[name='category']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
        var e = "";
        $("tr[data-tr='" + id + "'] td").eq(2).children("ol").children("li").each(function() {
            e = e + $.trim($(this).text()) + ",";
        });
        $("form#categoryForm input[name='cars']").val(e.slice(0, -1));
        $("form#categoryForm input[name='seats']").val($("tr[data-tr='" + id + "'] td").eq(3).text());
        var optValue = $.trim($("tr[data-tr='" + id + "'] td").eq(5).text());
        var chkValue = "Yes";
        if (optValue == chkValue) {
            $('#optionsRadios1').parent('div').addClass('checked');
            $('#optionsRadios2').parent('div').removeClass('checked');
        }
        else {
            $('#optionsRadios2').parent('div').addClass('checked');
            $('#optionsRadios1').parent('div').removeClass('checked');
        }
        $("form#categoryForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
        $("form#categoryForm").attr("action", "{{ URL::route('category_edit')}}");
    });
    $(document).on("click", ".userEdit", function() {
        var id = $(this).attr('data-id');
        $("form#userForm input[name='fname']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
        $("form#userForm input[name='lname']").val($("tr[data-tr='" + id + "'] td").eq(2).text());
        $("form#userForm input[name='email']").val($("tr[data-tr='" + id + "'] td").eq(3).text());
        $("form#userForm input[name='phone']").val($("tr[data-tr='" + id + "'] td").eq(4).text());
        $("form#userForm textarea[name='address']").val($("tr[data-tr='" + id + "'] td").eq(5).text());
        $("form#userForm select[name='city'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(6).attr("data-value") + "']").prop('selected', true);
        $("form#userForm input[name='zipcode']").val($("tr[data-tr='" + id + "'] td").eq(7).text());
        $("form#userForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
        $("form#userForm").attr("action", "{{ URL::route('user_edit') }}");
    });
    //listing edit

    $(document).on("click", ".listingEdit", function() {
        var id = $(this).attr('data-id');
        $("form#listingForm select[name='city'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(1).attr("data-value") + "']").prop('selected', true);
        $("form#listingForm select[name='service'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(2).attr("data-value") + "']").prop('selected', true);
        $("form#listingForm select[name='category'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(3).attr("data-value") + "']").prop('selected', true);
        $("form#listingForm select[name='package'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(4).attr("data-value") + "']").prop('selected', true);
        $("form#listingForm input[name='min_kms']").val($("tr[data-tr='" + id + "'] td").eq(5).text());
        $("form#listingForm input[name='min_hrs']").val($("tr[data-tr='" + id + "'] td").eq(6).text());

        $("form#listingForm input[name='base_cost']").val($("tr[data-tr='" + id + "'] td").eq(7).text());
        $("form#listingForm input[name='driver_cost']").val($("tr[data-tr='" + id + "'] td").eq(8).text());
        $("form#listingForm input[name='extra_km_cost']").val($("tr[data-tr='" + id + "'] td").eq(9).text());
        $("form#listingForm input[name='extra_hr_cost']").val($("tr[data-tr='" + id + "'] td").eq(10).text());
        $("form#listingForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
        $("form#listingForm").attr("action", "{{ URL::route('listing_edit') }}");
    });
//Vender Listing Edit

    $(document).on("click", ".venderListingEdit", function() {
        var id = $(this).attr('data-id');
        $("form#venderListingForm select[name='vender_name'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(1).attr("data-value") + "']").prop('selected', true);
        $("form#venderListingForm select[name='city'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(2).attr("data-value") + "']").prop('selected', true);
        $("form#venderListingForm select[name='service'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(3).attr("data-value") + "']").prop('selected', true);
        $("form#venderListingForm select[name='category'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(4).attr("data-value") + "']").prop('selected', true);
        $("form#venderListingForm select[name='package'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(5).attr("data-value") + "']").prop('selected', true);
        $("form#venderListingForm input[name='min_kms']").val($("tr[data-tr='" + id + "'] td").eq(6).text());
        $("form#venderListingForm input[name='min_hrs']").val($("tr[data-tr='" + id + "'] td").eq(7).text());
        $("form#venderListingForm input[name='base_cost']").val($("tr[data-tr='" + id + "'] td").eq(8).text());
        $("form#venderListingForm input[name='driver_cost']").val($("tr[data-tr='" + id + "'] td").eq(9).text());
        $("form#venderListingForm input[name='extra_km_cost']").val($("tr[data-tr='" + id + "'] td").eq(10).text());
        $("form#venderListingForm input[name='extra_hr_cost']").val($("tr[data-tr='" + id + "'] td").eq(11).text());
        $("form#venderListingForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
        $("form#venderListingForm").attr("action", "{{ URL::route('vender_listing_edit') }}");
    });


</script>