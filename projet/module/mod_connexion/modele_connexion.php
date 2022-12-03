<?php
    require_once('connexion.php'); 
    class ModeleConnexion extends Connexion{ 
        public function __construct() {
         
           
        }
        public  function inscrire_dans_la_BD($login,$mdp,$mdp2,$email){
            if($mdp!=$mdp2){
                echo "
                <script> 
                
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Les mots de passes ne sont pas identiques',
                    
                  })
                  setTimeout(
                    function() 
                    {
                       window.location.href = 'index.php?module=connexion&action=AfficherFormulaireInscription';
                    }, 1000);
                
                </script>
                
                
                ";
            }else{
                $tro = parent::$bdd->prepare("SELECT count(login) FROM Utilisateurs WHERE login = ?");
            $tro->execute(array($login));
            $row = $tro->fetch();
            if($row["count(login)"] == "0"){
                $che = parent::$bdd->prepare("SELECT count(email) FROM Utilisateurs WHERE email=?");
                $che->execute(array($email));
                $row2 = $che->fetch();
                if($row2["count(email)"] == "0"){
                    $sth = parent::$bdd->prepare("INSERT INTO Utilisateurs (login,mdp,email,idRole) VALUES (?,?,?,?)");
                    $sth->execute(array($login,password_hash($mdp,PASSWORD_ARGON2I),$email,NULL));
                    echo 'Bienvenue sur notre site : '.$login;
                }else{
                    echo "
                    <script> 
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Adresse mail déjà utilisé',
                        
                      })
                      setTimeout(
                        function() 
                        {
                           window.location.href = 'index.php?module=connexion&action=AfficherFormulaireInscription';
                        }, 1000);
                    
                    </script>
                    
                    
                    ";
                }
            }else{
                echo "
                    <script> 
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'login déjà utilisé',
                        
                      })
                      setTimeout(
                        function() 
                        {
                           window.location.href = 'index.php?module=connexion&action=AfficherFormulaireInscription';
                        }, 1000);
                    
                    </script>
                    
                    
                    ";
            }
            }
            
            
        } 


         public  function connexion_dans_la_BD($login,$mdp){
            $bdd=parent::$bdd;
            $sth = $bdd->prepare("SELECT count(login) FROM Utilisateurs WHERE login=? OR email=?");
            $sth->execute(array($login,$login));
            $row = $sth->fetch();
            if($row["count(login)"]==0 || $login==NULL){
                echo "
                <script> Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'nom d\'utilisateur ou email inexistant',
                    
                  })
                  setTimeout(
                    function() 
                    {
                       window.location.href = 'index.php?module=connexion&action=AfficherFormulaireConnexion';
                    }, 1000);
                
            
                </script>
                
                        "
 ;
            }
       
                
            else{
            $sth = $bdd->prepare("SELECT * FROM Utilisateurs WHERE login=? OR email=?");
            $sth->execute(array($login,$login));
            $row = $sth->fetch();
                if(password_verify($mdp, $row['mdp'])){
                    $_SESSION['login']=$row['login'];
                    $_SESSION['id']=$row['idUtilisateur'];
                    $_SESSION['photo'] = $row['photo'];
                    if($row['idRole']==1)
                        $_SESSION['role']=1;
                    else
                         $_SESSION['role']=0;
                    echo "
                        <script> Swal.fire('Connexion réussie')  
                        setTimeout(
                            function() 
                            {
                            window.location.href = 'index.php?module=connexion&action=bienvenue';
                            }, 1000);
                    
                        </script>
                        
                                "
         ;
                   
                }else{
                    echo "
                    <script> 
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'mot de passe incorrect',
                        
                      })
                      setTimeout(
                        function() 
                        {
                           window.location.href = 'index.php?module=connexion&action=AfficherFormulaireConnexion';
                        }, 1000);
                    
                    </script>
                    
                    
                    ";
                }         
            }
        }
            
       
        
    }
?>