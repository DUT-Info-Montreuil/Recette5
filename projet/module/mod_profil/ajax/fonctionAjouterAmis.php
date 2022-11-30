<script > 


         $().ready(function(){
            $('#amis').append('<button type="button" id="ajouter" class="btn btn-outline-light">SUIVRE</button>');
            $('#amis').append('<button type="button" id="supprimerAmis" class="btn btn-outline-danger">NE PAS SUIVRE</button>');
            $('#ajouter').hide();
            $('#supprimer').hide();

            $.post("module/mod_profil/ajax/amis.php",{idUtilisateur:<?php echo$_GET['idUtilisateur']?>, profil:<?php echo$_SESSION['id']?>}, function(data){
                if(data==1){
                    $("#supprimerAmis").show();
                    
                }else{
                    $("#ajouter").show();
                }
            });
});

$(
        function(){
            $("#supprimerAmis").click(
            function(){
                
                $.post("module/mod_profil/ajax/supprimerAmi.php",{idUtilisateur:<?php echo$_GET['idUtilisateur'] ?>,profil:<?php echo$_SESSION['id']?>},function(data){  
                    $("#supprimerAmis").hide();
                    setTimeout(
                        function(){
                            $("#ajouter").show();
                        }, 1000);
                    Notif.fire({
                        icon: 'error',
                        title: 'Cette utilisateur n\'est plus suivi'
                    })
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
                    setTimeout(
                        function(){
                            $("#supprimerAmis").show();
                        }, 1000);
                    Notif.fire({
                        icon: 'success',
                        title: 'Cette utilisateur est suivi'
                    })

                });
            }

        );
        }
    );
      
</script>
