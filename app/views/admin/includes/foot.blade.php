<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<!-- Bootstrap -->
{{ HTML::script('public/admin/js/bootstrap.min.js'); }}
<!-- Datatables -->
{{ HTML::script('public/admin/js/plugins/datatables/jquery.dataTables.js'); }}
{{ HTML::script('public/admin/js/plugins/datatables/dataTables.bootstrap.js'); }}

<!-- AdminLTE App -->
{{ HTML::script('public/admin/js/AdminLTE/app.js'); }}


<script>
$(function() {

    $('#listingTables').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "aaSorting": []
    });
});</script>

<script>

    $(document).ready(function() {

//cities Edit
        $(document).on("click", ".citiesEdit", function() {
            var id = $(this).attr('data-id');
            $("form#citiesForm input[name='city']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            var optValue = ($("tr[data-tr='" + id + "'] td").eq(2).text());
            // alert(optValue);
            if (optValue == "Yes") {
             //    alert(optValue);
                $('#optionsRadios2').parent('div').removeClass('checked');
                $('#optionsRadios1').parent('div').addClass('checked');

            }
            else {
                 alert(optValue);
                $('#optionsRadios2').parent('div').addClass('checked');
                $('#optionsRadios1').parent('div').removeClass('checked');

            }
            $("form#citiesForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#citiesForm").attr("action", "{{ URL::route('cities_edit') }}");
        });
        //package Edit

        $(document).on("click", ".packageEdit", function() {
            var id = $(this).attr('data-id');
            $("form#packageForm input[name='package']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            var optValue = ($("tr[data-tr='" + id + "'] td").eq(2).text());
            if (optValue == "Yes") {
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
            var optValue = ($("tr[data-tr='" + id + "'] td").eq(2).text());
            if (optValue == "Yes") {
                $('#serviceoptionsRadios2').parent('div').addClass('checked');
                $('#serviceoptionsRadios1').parent('div').removeClass('checked');
            }
            else {

                $('#serviceoptionsRadios1').parent('div').addClass('checked');
                $('#serviceoptionsRadios2').parent('div').removeClass('checked');
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
            $("form#venderForm input[name='cityName']").val($("tr[data-tr='" + id + "'] td").eq(2).text());
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