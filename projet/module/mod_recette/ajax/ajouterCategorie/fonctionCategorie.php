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
                        $("#lesCategories").append('<div class="form-check">');
                        $("#lesCategories").append('<input type="radio" name="cat" value="'+row.idCategorie+'" id="cat" >');
                        $("#lesCategories").append('<label class="form-check-label"');
                        $("#lesCategories").append(row.nom+'</label></div>');
                      
                    });
                
                }
             
            });

    
            });


            $(document).on('click', '#cat', function(){  
                
                var oui = $(this).val();
                $("#lesSousCategories").empty();
                
                $.post("module/mod_recette/ajax/ajouterCategorie/recupererSousCategorie.php",{test:oui},function(data){  
                    $(data).each(function(i, row){
                        $("#lesSousCategories").append('<div class="form-check">');
                        $("#lesSousCategories").append('<input type="radio" name="sousCat" value="'+row.idSousCategorie+'" id="sousCat" >');
                        $("#lesSousCategories").append('<label class="form-check-label"');
                        $("#lesSousCategories").append(row.nomSousCategorie+'</label></div>');
                      
                    });
                });
                $("#lesSousCategories").append('<div class="form-check" align="bottom">');
                $("#lesSousCategories").append('<input type="radio" name="sousCat" value="rien" id="sousCat" >');
                $("#lesSousCategories").append('<label class="form-check-label"');
                $("#lesSousCategories").append('Autre</label></div>');
                
                
               

        });  

           
             
        
        });


        

      
</script>