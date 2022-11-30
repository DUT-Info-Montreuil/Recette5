<script>

$(document).ready(function(){
    $("#search").keyup(function(){
        var input = $(this).val();
        let rien = new FormData();
        rien.append('titre',input);
        




        if(input != "" ){
            $.ajax({
                type: "POST",
                url: "composants/menu/ajax/resultats.php",
                data: rien,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    $('#barreRecherche').empty();
                   if(data!="vide"){

                    $(data).each(function(i, row){
                        if(i<7){
                            if(i==0)
                                $('#barreRecherche').append('<a href="index.php?module=recette&action=afficherMaRecette&idRecette='+row.idRecette+'">'+(i+1)+'. <img src="image/image_recette/'+row.photo+'">' + row.titre.slice(0,8)+'</a></br>');
                            else
                                $('#barreRecherche').append('<hr class="my-4"><a href="index.php?module=recette&action=afficherMaRecette&idRecette='+row.idRecette+'">'+(i+1)+'. <img src="image/image_recette/'+row.photo+'">' + row.titre.slice(0,8)+'</a></br>');
                        }
                        
                    });

                   }else{
                    $('#barreRecherche').append('aucun résultats.');
                   }
                 
                }
            })
        }else{

        }
        
    });
});
</script>