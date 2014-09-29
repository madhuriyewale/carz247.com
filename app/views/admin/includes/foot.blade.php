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
        "bAutoWidth": false
    });



});

</script>

<script>

    $(document).ready(function() {
        
//cities Edit
        $('.citiesEdit').click(function() {
            var id = $(this).attr('data-id');
            $("form#citiesForm input[name='cities']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            $("form#citiesForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#citiesForm").attr("action", "{{ URL::route('cities_edit') }}");
        });
        
        
//package Edit
        $('.packageEdit').click(function() {
            var id = $(this).attr('data-id');
            $("form#packageForm input[name='package']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            $("form#packageForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#packageForm").attr("action", "{{ URL::route('package_edit') }}");
        });


//service Edit
        $('.serviceEdit').click(function() {
            var id = $(this).attr('data-id');
            $("form#serviceForm input[name='service']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            //  $("form#serviceForm input[name='status']").val($("tr[data-tr='" + id + "'] td").eq(2).text().prop('selected', true));
            // $("form#serviceForm radio[value='" + radioVal + "']").parent().addClass("checked");
            // $('[checked="checked"]').parent().addClass("active");
            
            alert( $("input[type=radio][name=status]").val() );
            $("form#serviceForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#serviceForm").attr("action", "{{ URL::route('service_edit') }}");

        });

    });

    //category Edit

    $('.categoryEdit').click(function() {
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



    //listing edit


    $('.listingEdit').click(function() {
        var id = $(this).attr('data-id');


        $("form#listingForm select[name='city'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(1).attr("data-value") + "']").prop('selected', true);
        $("form#listingForm select[name='service'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(2).attr("data-value") + "']").prop('selected', true);
        $("form#listingForm select[name='category'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(3).attr("data-value") + "']").prop('selected', true);
        $("form#listingForm select[name='package'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(4).attr("data-value") + "']").prop('selected', true);

        $("form#listingForm input[name='min_kms']").val($("tr[data-tr='" + id + "'] td").eq(5).text());
        $("form#listingForm input[name='base_cost']").val($("tr[data-tr='" + id + "'] td").eq(6).text());
        $("form#listingForm input[name='driver_cost']").val($("tr[data-tr='" + id + "'] td").eq(7).text());
        $("form#listingForm input[name='extra_km_cost']").val($("tr[data-tr='" + id + "'] td").eq(8).text());
        $("form#listingForm input[name='extra_hr_cost']").val($("tr[data-tr='" + id + "'] td").eq(9).text());


        $("form#listingForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
        $("form#listingForm").attr("action", "{{ URL::route('listing_edit') }}");
    });



</script>