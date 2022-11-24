<script>

$().ready(function(){
    $("#search").keyup(function(){
        var input = $(this).val();
        consol.log(input);
    });
});
</script>