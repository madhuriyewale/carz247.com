<div class="col-xs-6 pull-right" style="padding-top: 20px;">
    <button class="btn btn-danger addNew pull-right"><i class="fa fa-plus"></i> Add New {{ $name }}</button>
</div>
<script>
    $(document).ready(function() {
        $("form").hide();
        $(".addNew").click(function() {
            $(this).parent().parent().siblings(".box-body").children("form").toggle();
        });
        $("body").on("click", "a:contains('Edit')", function() {
            $("form").show();
            $("html, body").animate({scrollTop: 0}, "slow");
        });
    });
</script>