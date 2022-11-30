<script>
$().ready(function(){  
    $('#ajouterCategorie').append('<button type="button" class="non btn btn-secondary" data-bs-dismiss="modal" name="categ" value="plat" style="margin:5px">PLAT</button>');
    $('#ajouterCategorie').append('<button type="button" class="non btn btn-secondary" data-bs-dismiss="modal" name="categ" value="dessert" style="margin:5px">DESSERT</button>');

});

$(
        function(){
            $(".non").click(
                
            function(){
                var button = $(this);
                var nom = $(this).val();
                $("#lesCategories").append('<button type="button" class="choisie btn btn-info" name="categorieChoisie" value='+nom+'  style="margin:5px">'+nom+'</button>');
                button.hide();
                
                $(".choisie").click(
                    function(){
                        $(this).hide();
                        $(button).show();
                        
                    }

                );
                
            }

            

        );


        }
        
    );
    

</script>