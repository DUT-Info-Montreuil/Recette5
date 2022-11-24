<script > 


         $().ready(function(){
            $('#amis').append('<button type="button" id="ajouter" class="btn btn-outline-light">Ajouter en amis</button>');
            $('#amis').append('<button type="button" id="supprimer" class="btn btn-outline-danger">Supprimer des amis</button>');
            $('#amis').append('<p id="text">Utilisateur ajouté</p>');
            $('#amis').append('<p id="text2">Utilisateur supprimé</p>');
            $('#ajouter').hide();
            $('#supprimer').hide();
            $('#text').hide();
            $('#text2').hide();

            $.post("module/mod_profil/ajax/amis.php",{idUtilisateur:<?php echo$_GET['idUtilisateur']?>, profil:<?php echo$_SESSION['id']?>}, function(data){
                if(data==1){
                    $("#supprimer").show();
                    
                }else{
                    $("#ajouter").show();
                }
            });
});

$(
        function(){
            $("#supprimer").click(
            function(){
                
                $.post("module/mod_profil/ajax/supprimerAmi.php",{idUtilisateur:<?php echo$_GET['idUtilisateur'] ?>,profil:<?php echo$_SESSION['id']?>},function(data){  
                    $("#supprimer").hide();
                    $("#text2").show();
                    
                    setTimeout(
                        function() 
                        {
                            $("#text2").hide();
                            $("#ajouter").show();
                        }, 1000);

                });
            }

        );
        }
    );


    $(
        function(){
            $("#ajouter").click(
            function(){
                
                $.post("module/mod_profil/ajax/ajouterAmi.php",{idUtilisateur:<?php echo$_GET['idUtilisateur'] ?>,profil:<?php echo$_SESSION['id']?>},function(data){  
                    
                    $("#ajouter").hide();
                    $("#text").show();
                    setTimeout(
                        function() 
                        {
                            $("#text").hide();
                            $("#supprimer").show();
                        }, 1000);

                });
            }

        );
        }
    );
      
</script>
