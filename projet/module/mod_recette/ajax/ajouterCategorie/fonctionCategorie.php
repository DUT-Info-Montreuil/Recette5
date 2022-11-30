<script>
$().ready(function(){  
    $('#ajouterCategorie').append('<button type="button" class="non btn btn-info" data-bs-dismiss="modal" name="categ" value="PLAT" style="margin:5px">PLAT</button>');
    $('#ajouterCategorie').append('<button type="button" class="non btn btn-info" data-bs-dismiss="modal" name="categ" value="DESSERT" style="margin:5px">DESSERT</button>');

});

$(  
        function(){
            $(".non").click(
                
            function(){
                var nom = $(this).val();
                $("#categoriesSelectionne").append('<button type="button" class="choisie btn btn-info" name="categorieChoisie" value='+nom+'  style="margin:5px" disabled>'+nom+'</button>');
                $(this).hide();              
            });
        });

$(
        function(){
            $("#supprimerCategories").click(
                
            function(){
                $("#categoriesSelectionne").empty(); 
                $(".non").show();         
            });
        });
    

</script>