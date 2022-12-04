<script>
$(document).ready(function(){  
    
    $(function(){
        $.ajax({
                type: "POST",
                url: "module/mod_recette/ajax/ajouterCategorie/recupererCategorie.php",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    $(data).each(function(i, row){
                        $("#selectionnerCategories").append('<div id='+row.nom+' class="selCat" > <a href="index.php?module=recherche&action=toute&idCategorie='+row.idCategorie+'&page=1"><h5>'+row.nom+'</h5></a></br>');
                        $("#selectionnerCategories").append();
                        var nom = row.idCategorie;


                        $.post("module/mod_recette/ajax/ajouterCategorie/recupererSousCategorie.php",{test:nom},function(data2){  
                            $(data2).each(function(i2, row2){
                                $("#"+row.nom).append('<a href="index.php?module=recherche&action=toute&idSousCategorie='+row2.idSousCategorie+'&page=1">'+row2.nomSousCategorie+'</a></br>');
                            });
                        });


                    $("#selectionnerCategories").append(' </div>');
                      
                    });
                
                }
             
            });
    
            });
           
             
        
        });


        

      
</script>