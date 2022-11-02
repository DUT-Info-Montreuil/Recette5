<?php
require_once("vue_generique.php");
class VueProfil extends VueGenerique{

    public function __construct(){
        parent::__construct();   
    }

    public function afficherProfil($profil){
       
        if($profil['photo'] == NULL){
            echo'
            <div class="rond" align="center"> 
                <img align="center" alt="photo profil par defaut" src="image/profil.png"></br>
                <form method="post" action="index.php?module=profil&action=afficherProfil" enctype="multipart/form-data">
                    <label for="file">modifier photo : </label>
                    <input type="file" name="file">
                    <input type="submit" value="evoyer"><br />
                </form>
            </div>';
        }else{
            echo'
            <div class="rond" align="center"> 
                <img align="center" alt="photo utilisateur" src="image/image_utilisateur/'.$profil['photo'].'"></br> 
                <form method="post" action="index.php?module=profil&action=afficherProfil" enctype="multipart/form-data">
                    <label for="file">modifier photo : </label>
                    <input type="file" name="file">
                    <input type="submit" value="envoyer"><br />
                </form>
            </div>';
        }

        echo'Profil : '.$profil['login'].'</br>
        Adresse mail : '.$profil['email'].'</br>'; 
    }

}
?>