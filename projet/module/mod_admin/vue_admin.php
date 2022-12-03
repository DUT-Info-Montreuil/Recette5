<?php
    require_once('vue_generique.php');
  
    class VueAdmin extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();         
         }
    
        public function afficherAcceuilAdmin(){
            echo'<h1>acceuil admin</h1>
       
                
            ';
        }

       public function afficherGererUtilisateur($listeUtilisateur){

        echo'
         <table width="100%">
            <tr>
                <th>LOGIN</th>
                <th>ID</th>
                <th>email</th>
                <th>PHOTO</th>
                <th>NB de Recette</th>
                <th>NB de commentaire</th>
            </tr>
        ';

        foreach($listeUtilisateur as $utilisateur){
            echo'
            
            <tr>
                <td><a href="index.php?module=admin&action=afficherUtilisateur&idUtilisateur='.$utilisateur['idUtilisateur'].'">'.$utilisateur['login'].'</a></td>
                <td>'.$utilisateur['idUtilisateur'].'</td>
                <td>'.$utilisateur['email'].'</td>
            ';
            if($utilisateur['photo']==null){
                echo' <td><img src="image/profil.png"  width="50px" height="50px"> </td> ';
            }else{
                echo'<td><img src="image/image_utilisateur/'.$utilisateur['photo'].'"  width="50px" height="50px"></td>';
            }

            echo'
                    <td>'.$utilisateur['COUNT(Recette.idRecette)'].'</td>
                    <td>'.$utilisateur['COUNT(commentaire.idCommentaire)'].'</td>
                ';

            if($utilisateur['banni']==0){
                echo '    <td id="LesBoutonBan'.$utilisateur['idUtilisateur'].'"><button type="button" id="boutonBanUtilisateurs" value="'.$utilisateur['idUtilisateur'].'">bannir utilisateur</button></td>
                ';
            }else{
                echo '    <td id="LesBoutonBan'.$utilisateur['idUtilisateur'].'"><button type="button" id="boutonDeBanUtilisateurs" value="'.$utilisateur['idUtilisateur'].'">deban utilisateur</button></td>
                ';
            }

         echo' </tr>';
        }
        echo'</table> ';

   
       }


       public function afficherGererCommentaire($listeCommentaire){
      
     
            echo'<h2> voici les commentaires</h2>';
        
       
        foreach($listeCommentaire as $commentaire){
            echo'
         
         
            <div id="commentaire'.$commentaire['idCommentaire'].'" class="media">
                    <a class="pull-left" href="#"><img id="pp" width="100" class="media-object" src="image/image_utilisateur/'.$commentaire['photo'].'" alt=""></a>
                    <div class="media-body">
                        <h4 class="media-heading">'.$commentaire['login'].' a écrit le '.$commentaire['dateAjout'].' a '.$commentaire['heureAjout'].' :
                     
                            <button type="button"  id="BoutonSupprimerCommentaire" value="'.$commentaire['idCommentaire'].'" class="btn btn-danger btn_remove">supprimer commentaire</button>
                        
                       </p></h4>
                       id commentaire :'.$commentaire['idCommentaire'].' 
                        <p>texte :'.$commentaire['commentaire'].'</p>
             
                    </div>
                </div>
            
            
            ';
        }
       }

    }
?>