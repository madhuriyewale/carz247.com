<!-- Bootstrap -->
{{ HTML::script('public/admin/js/bootstrap.min.js'); }}
<!-- Datatables -->
{{ HTML::script('public/admin/js/plugins/datatables/jquery.dataTables.js'); }}
{{ HTML::script('public/admin/js/plugins/datatables/dataTables.bootstrap.js'); }}

<!-- AdminLTE App -->
{{ HTML::script('public/admin/js/AdminLTE/app.js'); }}
{{ HTML::script('public/admin/js/AdminLTE/demo.js'); }}

{{ HTML::script('public/admin/js/plugins/fullcalendar/fullcalendar.min.js'); }}

<script>
    $(function() {

        $('#listingTables').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "scrollX": true
        });



    });

</script>

   <script type="text/javascript">
            $(function() {

                /* initialize the external events
                 -----------------------------------------------------------------*/
                function ini_events(ele) {
                    ele.each(function() {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        };

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });
                }
                ini_events($('#external-events div.external-event'));

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)
                var date = new Date();
                var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear();
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    buttonText: {//This is to add icons to the visible buttons
                        prev: "<span class='fa fa-caret-left'></span>",
                        next: "<span class='fa fa-caret-right'></span>",
                        today: 'today',
                        month: 'month',
                        week: 'week',
                        day: 'day'
                    },
                    //Random default events
                    events: [
                        {
                            title: 'All Day Event',
                            start: new Date(y, m, 1),
                            backgroundColor: "#f56954", //red
                            borderColor: "#f56954" //red
                        },
                        {
                            title: 'Long Event',
                            start: new Date(y, m, d - 5),
                            end: new Date(y, m, d - 2),
                            backgroundColor: "#f39c12", //yellow
                            borderColor: "#f39c12" //yellow
                        },
                        {
                            title: 'Meeting',
                            start: new Date(y, m, d, 10, 30),
                            allDay: false,
                            backgroundColor: "#0073b7", //Blue
                            borderColor: "#0073b7" //Blue
                        },
                        {
                            title: 'Lunch',
                            start: new Date(y, m, d, 12, 0),
                            end: new Date(y, m, d, 14, 0),
                            allDay: false,
                            backgroundColor: "#00c0ef", //Info (aqua)
                            borderColor: "#00c0ef" //Info (aqua)
                        },
                        {
                            title: 'Birthday Party',
                            start: new Date(y, m, d + 1, 19, 0),
                            end: new Date(y, m, d + 1, 22, 30),
                            allDay: false,
                            backgroundColor: "#00a65a", //Success (green)
                            borderColor: "#00a65a" //Success (green)
                        },
                        {
                            title: 'Click for Google',
                            start: new Date(y, m, 28),
                            end: new Date(y, m, 29),
                            url: 'http://google.com/',
                            backgroundColor: "#3c8dbc", //Primary (light-blue)
                            borderColor: "#3c8dbc" //Primary (light-blue)
                        }
                    ],
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        copiedEventObject.backgroundColor = $(this).css("background-color");
                        copiedEventObject.borderColor = $(this).css("border-color");

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }

                    }
                });

                /* ADDING EVENTS */
                var currColor = "#f56954"; //Red by default
                //Color chooser button
                var colorChooser = $("#color-chooser-btn");
                $("#color-chooser > li > a").click(function(e) {
                    e.preventDefault();
                    //Save color
                    currColor = $(this).css("color");
                    //Add color effect to button
                    colorChooser
                            .css({"background-color": currColor, "border-color": currColor})
                            .html($(this).text()+' <span class="caret"></span>');
                });
                $("#add-new-event").click(function(e) {
                    e.preventDefault();
                    //Get value and make sure it is not null
                    var val = $("#new-event").val();
                    if (val.length == 0) {
                        return;
                    }

                    //Create event
                    var event = $("<div />");
                    event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
                    event.html(val);
                    $('#external-events').prepend(event);

                    //Add draggable funtionality
                    ini_events(event);

                    //Remove event from text input
                    $("#new-event").val("");
                });
            });
        </script>

<script>

    $(document).ready(function() {

//cities Edit
        $(document).on("click", ".citiesEdit", function() {
            var id = $(this).attr('data-id');
            $("form#citiesForm input[name='city']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            $("form#citiesForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#citiesForm").attr("action", "{{ URL::route('cities_edit') }}");
        });
//locality Edit
        $(document).on("click", ".localityEdit", function() {
            var id = $(this).attr('data-id');
            $("form#localityForm select[name='city'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(1).attr("data-value") + "']").prop('selected', true);
            $("form#localityForm input[name='locality']").val($("tr[data-tr='" + id + "'] td").eq(2).text());
            $("form#localityForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#localityForm").attr("action", "{{ URL::route('locality_edit') }}");
        });
//package Edit
        $(document).on("click", ".packageEdit", function() {
            var id = $(this).attr('data-id');
            $("form#packageForm input[name='package']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            $("form#packageForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#packageForm").attr("action", "{{ URL::route('package_edit') }}");
        });
//service Edit
        $(document).on("click", ".serviceEdit", function() {
            var id = $(this).attr('data-id');
            $("form#serviceForm input[name='service']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            //  $("form#serviceForm input[name='status']").val($("tr[data-tr='" + id + "'] td").eq(2).text().prop('selected', true));
            // $("form#serviceForm radio[value='" + radioVal + "']").parent().addClass("checked");
            // $('[checked="checked"]').parent().addClass("active");
            alert($("input[type=radio][name=status]").val());
            $("form#serviceForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#serviceForm").attr("action", "{{ URL::route('service_edit') }}");
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

//customer edit
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


//testimonials Edit
        $(document).on("click", ".testimonialEdit", function() {
            var id = $(this).attr('data-id');
            $("form#testimonialForm input[name='testimonial']").val($("tr[data-tr='" + id + "'] td").eq(1).text());
            $("form#testimonialForm input[name='from']").val($("tr[data-tr='" + id + "'] td").eq(2).text());
            $("form#testimonialForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#testimonialForm").attr("action", "{{ URL::route('testimonial_edit') }}");
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
//vender edit

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
</script>