<?php
class VueGenerique{
    public function __construct(){
        ob_start();
    }

    public function getAffichage(){
        if(isset($_SESSION['login'])){
            
        $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

        $sthh = $bdd->prepare('SELECT banni from Utilisateurs  where idUtilisateur= ?') ;
        $sthh->execute(array($_SESSION['id']));
        $rows= $sthh->fetch();
    
 
        if($rows['banni']){
     echo "
                    <script> 
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Désoler vous êtes banni',
                        
                      })
                      setTimeout(
                        function() 
                        {
                           window.location.href = 'index.php?module=connexion&action=deconnexion';
                        }, 1000);
                    
                    </script>
                    
                    
                    ";
        }
        }
        return ob_get_clean();
    }

}
?>