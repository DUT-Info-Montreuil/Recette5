
<script > 

         setInterval('load_nblikes()',500);
        
         function load_nblikes(){
            
            $.post("module/mod_recette/ajax/likerRecette/Nblike.php",{idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                $('#nbLike').empty().append('<h1>'+data+'</h1>');
                });

           
            
         }

         $(document).ready(function(){
           
            $("#supprimerRecette").append('<button class="btn btn-lg btn-danger" id="supRec">Supprimer</button>');
            $("#supprimerRecette").append('<button class="btn btn-lg btn-secondary" class="btn-close" data-bs-dismiss="modal">Annuler</button>');



            $('#divBoutonDeLike').append('<button class="btn btn-lg btn-secondary" id="boutonDeLike"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-heart-fill"    ><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path></svg></span></button>');
            $('#divBoutonDeLike').append('<button type="button" class="btn btn-lg btn-primary" id="boutonDeDisLike"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-heart-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path></svg></button>');
            $("#boutonDeLike").hide();
            $("#boutonDeDisLike").hide();
            $.post("module/mod_recette/ajax/likerRecette/Nblike.php",{idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                $('#nbLike').empty().append(data);
                });
            $.post("module/mod_recette/ajax/likerRecette/verfierSiLaRecetteEstLiker.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
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
                
                $.post("module/mod_recette/ajax/likerRecette/likerLaRecette.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                    $("#boutonDeLike").hide();
                    $("#boutonDeDisLike").show();
                    
                    Notif.fire({
                        icon: 'success',
                        title: 'Recette ajoutée aux favoris'
                    })
                });
            }

        );
        }
    );
    $(
        function(){
            $("#boutonDeDisLike").click(
            function(){

                $.post("module/mod_recette/ajax/likerRecette/dislikerLaRecette.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                    $("#boutonDeDisLike").hide();
                    $("#boutonDeLike").show();

                    Notif.fire({
                        icon: 'error',
                        title: 'Recette retirée des favoris'
                    })
                });
                
            }

        );
        }
    );
    
    $(
        function(){
            $("#supRec").click(
            function(){
                
                $.post("module/mod_recette/ajax/likerRecette/supprimerRecette.php",{idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                    $('#supprimerRecette').empty().append("votre recette s'est bien supprimer");
                    window.location.href = "index.php?module=recherche&action=toute";
                });
            }

        );
        }
    );

   </script>