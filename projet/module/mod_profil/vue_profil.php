<?php
require_once("vue_generique.php");
class VueProfil extends VueGenerique{

    public function __construct(){
        parent::__construct();   
    }

    public function afficherProfil($profil){
       
        if($profil['photo'] == NULL)
            $photo = 'image/profil.png';
        else
            $photo = 'image/image_utilisateur/'.$profil['photo'];
        

        $pro = '
        <div class="rond" > ';
            
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

            $pro = $pro.
                '<div align="center">
                    <img align="center" alt="pp par defaut" src="'.$photo.'"></br>   
                </div> 
                <div align="center">          
                    <h1>'.$profil['login'].'</h1>
                    <p class="lead">'.$profil['email'].'</p>
                </div>
                <div class="description">
                <p>'.$profil['description'].'</p>
                </div>
            </form>
        </div>';

        echo $pro;
        
        

    }

    public function modifierProfil($profil){
          
        if($profil['photo'] == NULL)
            $photo = 'image/profil.png';
        else
            $photo = 'image/image_utilisateur/'.$profil['photo'];
        

        echo'
        
        <div class="container" align="center">
      <div class="col-md-7 col-lg-8">
      <div class="rien">
        <img align="center" alt="pp par defaut" src="'.$photo.'">
      </div>
      <hr class="my-4">
        <h4 class="mb-3">Modification du profil</h4>
        <form class="needs-validation" novalidate method="post" action="index.php?module=profil&action=validerProfil" enctype="multipart/form-data">

            <div class=" col-12">
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
          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
</div>
';
    }

    public function validationModification(){
        echo'
        <form method="post" action="index.php?module=profil&action=afficherProfil" enctype="multipart/form-data">
            <div align="center">
                votre profil à été modifié <br />
                <input type="submit" value="retourner au profil">
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

             
