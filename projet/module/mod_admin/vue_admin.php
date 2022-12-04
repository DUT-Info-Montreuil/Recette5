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
                <th>description</th>
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
                    <td>'.$utilisateur['description'].'</td>
                    <td>'.$utilisateur['COUNT(Recette.idRecette)'].'</td>
                    <td>'.$utilisateur['COUNT(commentaire.idCommentaire)'].'</td>
                ';

            if($utilisateur['banni']==0){
                echo '    <td id="LesBoutonBan'.$utilisateur['idUtilisateur'].'"><button class="btn btn-danger" type="button" id="boutonBanUtilisateurs" value="'.$utilisateur['idUtilisateur'].'">bannir utilisateur</button></td>
                ';
            }else{
                echo '    <td id="LesBoutonBan'.$utilisateur['idUtilisateur'].'"><button class="btn btn-success" type="button" id="boutonDeBanUtilisateurs" value="'.$utilisateur['idUtilisateur'].'">deban utilisateur</button></td>
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
        echo' </div>';
       }

       public function afficherUtilisateur($utilisateur){
        echo' <p>photo de profile :<img  width="100px" height="100px" class="media-object" src="image/image_utilisateur/'.$utilisateur['photo'].'" alt=""></p>
              <p> id Utilisateur : '.$utilisateur['idUtilisateur'].'</p>
              <p> login : '.$utilisateur['login'].'</p>
              <p> email : '.$utilisateur['email'].'</p>
              <p> description : '.$utilisateur['description'].'</p>
              <div id="#LesBoutonBan'.$utilisateur['idUtilisateur'].'"> 
          ';
          if($utilisateur['banni']==1){
            echo'<button  type="button" class="btn btn-success" id="boutonDeBanUtilisateurs" value="'.$utilisateur['idUtilisateur'].'">deban utilisateur</button>';
          
          }
          else{
            echo'<button  type="button" class="btn btn-danger" id="boutonBanUtilisateurs" value="'.$utilisateur['idUtilisateur'].'">bannir utilisateur</button>';
          }
           

          echo'<button  type="button" class="btn btn-danger" id="boutonSupprimerUtilisateur" value="'.$utilisateur['idUtilisateur'].'">supprimer utilisateur</button>          </div>';
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
                echo'<div class="recetteAdmin" id="recette'.$recette['idRecette'].'">
                <img src="image/image_recette/'.$photo.'"  width="20%" >
                <p>titre : '.$recette['titre'].'<p/>
                <p>temps dePreparation : '.$recette['tpsPreparration'].'<p/>
                <p>date de Publication : '.$recette['datePublication'].'<p/>
                <p>note annexe : '.$recette['noteAnnexe'].'<p/>
                <p> vegan : '.$recette['vegan'].'</p>
                <p> createur :<a href="index.php?module=admin&action=afficherUtilisateur&idUtilisateur='.$recette['idUtilisateur'].'">'.$recette['idUtilisateur'].'</a></p>
                <button type="button"  id="BoutonSupprimerRecette" value="'.$recette['idRecette'].'" class="btn btn-danger btn_remove">supprimer Recette</button>
                            
                
                
                
                </div>
                ';
            }
       
       
              echo'</div>';
                   
           }
        }
        
    }
?>