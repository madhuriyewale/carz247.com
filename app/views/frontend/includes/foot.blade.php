<script>

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}





$(document).ready(function() {
    $(".datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: +1
    });
    $("#fromDate").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: +1,
        onClose: function(selectedDate) {
            $("#toDate").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#toDate").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: +1,
        onClose: function(selectedDate) {
            $("#fromDate").datepicker("option", "maxDate", selectedDate);
        }
    });

    if (location.pathname == "/") {
        $("#travel_to").autocomplete({
            source: cities_names
        });
    }
    $("#search_email").change(function() {
        var email = $(this).val();
        if (validateEmail(email)) {
            $.ajax({
                type: "POST",
                url: document.location.origin + "/get_customer",
                data: {email: email},
                cache: false,
                success: function(data)
                {
                    var response = jQuery.parseJSON(data);
                    if (typeof response == 'object')
                    {
                        console.log(response.id);
                        $("input[name='userId']").val(response.id);
                        $("input[name='firstname']").val(response.fname);
                        $("input[name='lastname']").val(response.lname);
                        $("input[name='phone']").val(response.phone);
                        $("input[name='address']").val(response.address);
                        $("input[name='zipcode']").val(response.zipcode);
                    }
                }
            });
        }
    });
});
</script>