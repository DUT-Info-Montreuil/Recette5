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
               
                $("#lesSousCategories").append('zaazazaz');
          

        });  

           
             
        
        });

      
</script>