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
                    $('#lesCategories').append(data);
                 
                }
            });


            });
        });
   

</script>