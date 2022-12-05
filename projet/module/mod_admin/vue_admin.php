<?php
    require_once('vue_generique.php');
  
    class VueAdmin extends VueGenerique{
      
        public   function __construct() {
            parent::__construct();         
         }
    
        public function afficherAcceuilAdmin(){
            echo'<div align="center" id="bvn">
            <h1 id="bienvenue">BIENVENUE ADMIN</h1>
            </div> ';
        }

       public function afficherGererUtilisateur($listeUtilisateur){

        echo'
         <table width="100%">
            <tr>
                <th>LOGIN</th>
                <th>ID</th>
                <th>email</th>
                <th>PHOTO</th>
                <th>description</th>
                <th>NB de Recette</th>
                <th>NB de commentaire</th>
            </tr>
        ';

        foreach($listeUtilisateur as $utilisateur){
            echo'
            
            <tr>
                <td><a href="index.php?module=admin&action=afficherUtilisateur&idUtilisateur='.htmlspecialchars($utilisateur['idUtilisateur']).'">'.htmlspecialchars($utilisateur['login']).'</a></td>
                <td>'.htmlspecialchars($utilisateur['idUtilisateur']).'</td>
                <td>'.htmlspecialchars($utilisateur['email']).'</td>
            ';
            if($utilisateur['photo']==null){
                echo' <td><img src="image/profil.png"  width="50px" height="50px"> </td> ';
            }else{
                echo'<td><img src="image/image_utilisateur/'.htmlspecialchars($utilisateur['photo']).'"  width="50px" height="50px"></td>';
            }

            echo'
                    <td>'.htmlspecialchars($utilisateur['description']).'</td>
                    <td>'.htmlspecialchars($utilisateur['COUNT(Recette.idRecette)']).'</td>
                    <td>'.htmlspecialchars($utilisateur['COUNT(commentaire.idCommentaire)']).'</td>
                ';

            if($utilisateur['banni']==0){
                echo '    <td id="LesBoutonBan'.htmlspecialchars($utilisateur['idUtilisateur']).'"><button class="btn btn-danger" type="button" id="boutonBanUtilisateurs" value="'.htmlspecialchars($utilisateur['idUtilisateur']).'">bannir utilisateur</button></td>
                ';
            }else{
                echo '    <td id="LesBoutonBan'.htmlspecialchars($utilisateur['idUtilisateur']).'"><button class="btn btn-success" type="button" id="boutonDeBanUtilisateurs" value="'.htmlspecialchars($utilisateur['idUtilisateur']).'">deban utilisateur</button></td>
                ';
            }

         echo' </tr>';
        }
        echo'</table> ';

   
       }


       public function afficherGererCommentaire($listeCommentaire){
      
     
            echo'<h2> voici les commentaires</h2>
            
            <input widht type="search" id="chercherCom" class="form-control rounded" placeholder="chercher un mot spécifique"/>
            
            <div id="divCommentaire">
            '
            ;
        
       
        foreach($listeCommentaire as $commentaire){
            echo'
         
         
            <div id="commentaire'.htmlspecialchars($commentaire['idCommentaire']).'" class="media">
                    <a class="pull-left" href="#"><img id="pp" width="100" class="media-object" src="image/image_utilisateur/'.htmlspecialchars($commentaire['photo']).'" alt=""></a>
                    <div class="media-body">
                        <h4 class="media-heading">'.htmlspecialchars($commentaire['login']).' a écrit le '.htmlspecialchars($commentaire['dateAjout']).' a '.htmlspecialchars($commentaire['heureAjout']).' :
                     
                            <button type="button"  id="BoutonSupprimerCommentaire" value="'.htmlspecialchars($commentaire['idCommentaire']).'" class="btn btn-danger btn_remove">supprimer commentaire</button>
                        
                       </p></h4>
                       id commentaire :'.htmlspecialchars($commentaire['idCommentaire']).' 
                        <p>texte :'.htmlspecialchars($commentaire['commentaire']).'</p>
             
                    </div>
                </div>
            
            
            ';
        }
        echo' </div>';
       }

       public function afficherUtilisateur($utilisateur){
        echo' <p>photo de profile :<img  width="100px" height="100px" class="media-object" src="image/image_utilisateur/'.htmlspecialchars($utilisateur['photo']).'" alt=""></p>
              <p> id Utilisateur : '.htmlspecialchars($utilisateur['idUtilisateur']).'</p>
              <p> login : '.htmlspecialchars($utilisateur['login']).'</p>
              <p> email : '.htmlspecialchars($utilisateur['email']).'</p>
              <p> description : '.htmlspecialchars($utilisateur['description']).'</p>
              <div id="#LesBoutonBan'.htmlspecialchars($utilisateur['idUtilisateur']).'"> 
          ';
          if($utilisateur['banni']==1){
            echo'<button  type="button" class="btn btn-success" id="boutonDeBanUtilisateurs" value="'.htmlspecialchars($utilisateur['idUtilisateur']).'">deban utilisateur</button>';
          
          }
          else{
            echo'<button  type="button" class="btn btn-danger" id="boutonBanUtilisateurs" value="'.htmlspecialchars($utilisateur['idUtilisateur']).'">bannir utilisateur</button>';
          }
           

          echo'<button  type="button" class="btn btn-danger" id="boutonSupprimerUtilisateur" value="'.htmlspecialchars($utilisateur['idUtilisateur']).'">supprimer utilisateur</button>          </div>';
       }

       public function afficherTouteLesRecette($listeRecette){

        if($listeRecette == NULL){
            echo '<div align="center"><p class="text-muted">Aucune recette</p></div> ';
        }else{
            echo' <input widht type="search" id="chercherRecette" class="form-control rounded" placeholder="chercher une Recette"/>';
            echo'<div id="divRecette">';

            foreach($listeRecette as $recette){
    
                if($recette['photo'] != NULL){
                    $photo= $recette['photo'];
                    
                 }
                 else{
                    $photo = 'plat.png';
                 }
                echo'<div class="recetteAdmin" id="recette'.htmlspecialchars($recette['idRecette']).'">
                <img src="image/image_recette/'.$photo.'"  width="20%" >
                <p>titre : '.htmlspecialchars($recette['titre']).'<p/>
                <p>temps dePreparation : '.htmlspecialchars($recette['tpsPreparration']).'<p/>
                <p>date de Publication : '.htmlspecialchars($recette['datePublication']).'<p/>
                <p>note annexe : '.htmlspecialchars($recette['noteAnnexe']).'<p/>
                <p> vegan : '.htmlspecialchars($recette['vegan']).'</p>
                <p> createur :<a href="index.php?module=admin&action=afficherUtilisateur&idUtilisateur='.htmlspecialchars($recette['idUtilisateur']).'">'.htmlspecialchars($recette['idUtilisateur']).'</a></p>
                <button type="button"  id="BoutonSupprimerRecette" value="'.htmlspecialchars($recette['idRecette']).'" class="btn btn-danger btn_remove">supprimer Recette</button>
                            
                
                
                
                </div>
                ';
            }
       
       
              echo'</div>';
                   
           }
        }
        
    }
?>