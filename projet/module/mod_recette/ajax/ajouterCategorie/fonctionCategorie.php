<script>
$().ready(function(){  
    $("#categoriesSelectionne").append('<input class="cat form-check-input mt-0" type="checkbox" name="plat" value="PLAT"> <label class="form-check-label" for="cat">PLAT</label>');
    $("#categoriesSelectionne").append('<input class="cat form-check-input mt-0" type="checkbox" name="dessert" value="DESSERT"> <label class="form-check-label" for="cat">DESSERT</label>');

});

$(  
        function(){
            $("#supprimerCategories").click(
                
            function(){
                $(".cat").prop('checked',false);             
            });
        });

    

</script>