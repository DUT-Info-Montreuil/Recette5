<?php
require_once("vue_generique.php");
class VueProfil extends VueGenerique{

    public function __construct(){
        parent::__construct();   
    }

    public function afficherProfil($profil){
        echo'
        Profil : '.$profil['login'].'</br>
        Adresse mail : '.$profil['email']; 
    }

}
?>