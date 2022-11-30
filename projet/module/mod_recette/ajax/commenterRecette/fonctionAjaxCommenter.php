
<script > 



 $(document).ready(function(){
    
    $.post("module/mod_recette/ajax/commenterRecette/verifierCommentaire.php",{idRecette:<?php echo$_GET['idRecette']?>},function(data){  
            
        if(data=="deja com"){
         
                    $("#formCommenterRecette").hide();
                }
                });


            $(
        function(){
                $("#formCommenterRecette").submit(
                function(){
                        let form=new FormData(this);
                        form.append('idRecette',<?php echo $_GET['idRecette'] ?>)
                    $.ajax({
                        type: "POST",
                        url: "module/mod_recette/ajax/commenterRecette/commenterLaRecette.php",
                        data: form,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                        
                                Notif.fire({
                                    icon: 'success',
                                    title: 'Commentaire Ajouter'
                                })
                                $("#formCommenterRecette").hide();
                           
                        }
                    })
                }
            );
        }
      
    );
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


   </script>