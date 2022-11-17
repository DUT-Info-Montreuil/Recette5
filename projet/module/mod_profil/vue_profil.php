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
                $pro = $pro.'<form method="post" action="index.php?module=profil&action=modifierProfil" enctype="multipart/form-data">
                <input type="submit" value="modifier profil" >';
            else{
                $pro = $pro.'<form method="post" action="index.php?module=profil&action=ajouterAmis&id='.$profil['idUtilisateur'].'" >
                <input type="submit" value="ajouter amis" >';
            }

            $pro = $pro.
                '<div align="center">
                    <img align="center" alt="pp par defaut" src="'.$photo.'"></br>   
                </div>           
                Profil : '.$profil['login'].'</br>
                Adresse mail : '.$profil['email'].'</br>
                Description : '.$profil['description'].'</br>
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
        <div class="rond"> 
            <form method="post" action="index.php?module=profil&action=validerProfil" enctype="multipart/form-data">
                <div align="center">
                    <img align="center" alt="pp par defaut" src="'.$photo.'"></br>   
                </div>           
                <label for="file">modifier photo : </label>
                <input type="file" name="file">

                <label for="nom">modifier login : </label></br>
                <input type="text" name="nom" value="'.htmlspecialchars($profil['login']).'"><br />

                Adresse mail : '.htmlspecialchars($profil['email']).'</br>

                <label for="description"> modifier description : </label></br>
                <input type="text" name="description" value='.htmlspecialchars($profil['description']).' ><br />
 
                    <label for="oldmdp">ancien mot de passe :</label><br />
                    <input type="text" name="oldmdp"><br />

                    <label for="newmdp">nouveau mot de passe :</label> <br />
                    <input type="text" name="newmdp"><br />

                    <label for="newmdpc">confirmation du nouveau mot de passe :</label> <br />
                    <input type="text" name="newmdpc"><br />

                <input type="submit" value="valider"><br />
            </form>
        </div>';
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
            
            <a href="index.php?module=profil&action=afficherProfilUtilisateur&idUtilisateur='.$values['idUtilisateur_1'].'">
            <div class="rond">
                <img alt="pp par defaut" src="image/image_utilisateur/'.$values['photo'].'"></br>   
            </div></a>';
           
        }
    }

}
?>

             
