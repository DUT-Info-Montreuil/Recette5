<?php
require_once("vue_generique.php");
class VueProfil extends VueGenerique{

    public function __construct(){
        parent::__construct();   
    }

    public function afficherProfil($profil,$tabR){
       
        if($profil['photo'] == NULL)
            $photo = 'image/profil.png';
        else
            $photo = 'image/image_utilisateur/'.htmlspecialchars($profil['photo']);
        
        
        $pro = '
        <div class="rond" > ';
        if(isset($_SESSION['id'])){
            if($profil['idUtilisateur'] == $_SESSION['id'])
                $pro = $pro.'
                <div class="modifPro">
                <a href="index.php?module=profil&action=modifierProfil" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a></div>';
            else{
                $pro = $pro.'
                <div align="right" id="amis">
                
                </div>';
            }
          }

            $pro = $pro.
                '<div align="center">
                    <img align="center" alt="pp par defaut" src="'.$photo.'"></br>   
                </div> 
                <div align="center">          
                    <h1>'.htmlspecialchars($profil['login']).'</h1>
                    <p class="lead">'.htmlspecialchars($profil['email']).'</p>
                </div>
                <div class="description">
                <p>'.htmlspecialchars($profil['description']).'</p>
                </div>            
        </div>
        <hr class="my-4"> ';
        echo $pro;
            
            
          if($tabR == NULL){
            echo '<div align="center"><p class="text-muted">Aucune recette</p></div>';
          }else{


                     


            foreach($tabR as $value){
              if($value['photo'] != NULL){
                $photo= $value['photo'];   
             }
             else{
                $photo = 'plat.png';
   
             }
                echo'
              <div class="col"> 
               <div class="card shadow-sm">            
                  <img src="image/image_recette/'.$photo.'"  width="100%" height="225">          
                 <div class="card-body">
                 <h1 class="card-text">'.substr($value['titre'], 0, 15);
              if(strlen($value['titre']) > 15)
                 echo '...';
              echo '</h1><p class="card-text">'.substr($value['description'], 0, 39);
                if(strlen($value['description']) > 39)
                 echo '...';
                echo '</p>            
                   <div class="d-flex justify-content-between align-items-center">
                     <div class="btn-group">
                      <a href="index.php?module=recette&action=afficherMaRecette&idRecette='.htmlspecialchars($value['idRecette']).'"><button type="button" class="btn btn-sm btn-outline-secondary">Détails</button></a>';
                      if($value['vegan'] == 1){
                        echo '<button type="button" class="btn btn-sm btn-success" disabled>Vegan</button>';
                     }          
                       echo '</div>
                     <div class="text-group" color="black">
                     <small class="text-muted">';
                     if(floor((htmlspecialchars($value['tpsPreparration'])/60)) != 0)
                     echo floor((htmlspecialchars($value['tpsPreparration'])/60)).'h';
                   echo (htmlspecialchars($value['tpsPreparration'])%60).'min</small>
                     
                     </div>
                     <small class="text-muted">'.htmlspecialchars($value['datePublication']).'</small>
                   </div>
                 </div>
               </div>
             </div>  ';
            }       
        }
      }
        

       
        
        

    

    public function modifierProfil($profil){
          
        if($profil['photo'] == NULL)
            $photo = 'image/profil.png';
        else
            $photo = 'image/image_utilisateur/'.$profil['photo'];
        

        echo'
        
        <div class="container" align="center">
      <div class="col-md-7 col-lg-8">
      <div class="rien" >
        <img align="center" alt="pp par defaut" src="'.$photo.'">
      </div>
      <hr class="my-4">
        <h4 class="mb-3">Modification du profil</h4>
        <form class="needs-validation" novalidate method="post" action="index.php?module=profil&action=validerProfil" enctype="multipart/form-data">

            <div class=" col-12" >
                <label for="formFile" class="form-label">Changer votre photo de profil</label>
                <input class="form-control" name="file" type="file" id="formFile">
            </div>
            

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" name="nom" class="form-control" id="username" placeholder="'.$profil['login'].'" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>
            <div class="col-12">
              <label for="address" class="form-label">Ancien mot de passe</label>
              <input type="text" name="oldmdp" class="form-control" id="address" required>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Nouveau mot de passe<span class="text-muted"></span></label>
              <input type="text" name="newmdp" class="form-control" id="address2" >
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Confirmation du nouveau mot de passe<span class="text-muted"></span></label>
              <input type="text" name="newmdpc" class="form-control" id="address2" >
            </div>

            <div class="col-12 l-12">
              <label for="address2" class="form-label">Description<span class="text-muted"></span></label>
              <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" >'.$profil['description'].'</textarea>
            </div>

          <hr class="my-4">
          <a href="index.php?module=profil&action=afficherProfil"><button type="button" class="w-80 btn btn-secondary btn-lg" >Annuler</button></a>
          <button class="w-80 btn btn-primary btn-lg" type="submit">Valider</button>
          <input type="hidden" name="token" value='.$_SESSION['token'].' >
          </form>
      </div>
    </div>
';
    }

    public function validationModification(){
        echo'
        <form method="post" action="index.php?module=profil&action=afficherProfil" enctype="multipart/form-data">
            <div align="center">
                votre profil à été modifié <br />
                <input class="btn btn-primary" type="submit" value="retourner au profil">
            </div>
        </form>';
    }

    public function voirAmis($amis){
        foreach($amis as $values){
            echo '

            <div class="card" style="width: 18rem;">
            <img src="image/image_utilisateur/'.$values['photo'].'" class="card-img-top" alt="pp amis">
            <div class="card-body">
                <h5 class="card-title">'.$values['login'].'</h5>
                <a href="index.php?module=profil&action=afficherProfilUtilisateur&idUtilisateur='.$values['idUtilisateur_1'].'" class="btn btn-primary">Voir le profil</a>
            </div>
            </div>'
            ;
           
        }
    }

}
?>

             
