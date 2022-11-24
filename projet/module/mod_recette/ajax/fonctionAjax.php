<script > 
         setInterval('load_nblikes()',500);
        
         function load_nblikes(){
            
            $.post("module/mod_recette/ajax/Nblike.php",{idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                $('#nbLike').empty().append(data);
                });

           
            
         }

         $(document).ready(function(){
            $('#divBoutonDeLike').append('<button  id="boutonDeDisLike"><img src="image/dislike.png" height ="80" width="100" /></button>   ');
            $('#divBoutonDeLike').append('<button  id="boutonDeLike"><img src="image/like.png" height ="80" width="100" /></button>');
            $("#boutonDeLike").hide();
            $("#boutonDeDisLike").hide();
            $.post("module/mod_recette/ajax/Nblike.php",{idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                $('#nbLike').empty().append(data);
                });
            $.post("module/mod_recette/ajax/verfierSiLaRecetteEstLiker.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                   if(data==1)
                   $("#boutonDeDisLike").show();
                   else{
                    $("#boutonDeLike").show();
                   }
                });
});
       
         $(
        function(){
            $("#boutonDeLike").click(
            function(){
                
                $.post("module/mod_recette/ajax/likerLaRecette.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                    $("#boutonDeLike").hide();
                    $("#boutonDeDisLike").show();
                });
            }

        );
        }
    );
    $(
        function(){
            $("#boutonDeDisLike").click(
            function(){

                $.post("module/mod_recette/ajax/dislikerLaRecette.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                    $("#boutonDeDisLike").hide();
                    $("#boutonDeLike").show();
                });
                
            }

        );
        }
    );


   </script>