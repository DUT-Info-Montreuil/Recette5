<script>
$().ready(function(){  
    $("#categoriesSelectionne").append('<input class="cat form-check-input mt-0" type="checkbox" name="plat" value="PLAT"> <label class="form-check-label" for="cat">Plat</label></br>');

});

$(  
        function(){
            $("#supprimerCategories").click(
                
            function(){
                $(".cat").prop('checked',false);             
            });
        });

    

</script>