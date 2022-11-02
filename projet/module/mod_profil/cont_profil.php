<?php
require_once("vue_profil.php");
require_once("modele_profil.php");
class ContProfil{
    private $vue;
    private $modele;
    private $action;

public function __construct(){
    $this->vue = new VueProfil();
    $this->modele = new ModeleProfil();
    $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
}  

public function afficherProfil(){
    $this->vue->afficherProfil($this->modele->profil());
    $this->modifierPhoto($_FILES);
}

public function modifierPhoto($photo){
    if(isset($photo['file'])){
        $tmpName = $photo['file']['tmp_name'];
        $name = $photo['file']['name'];
        $size = $photo['file']['size'];
        $error = $photo['file']['error'];
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension)); 
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        $maxSize = 4000000000;
  
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
            $photoActuelle = $this->modele->recupererPhotoActuelle();
            if($photoActuelle['photo']!= NULL){
                
                unlink('image/image_utilisateur/'.$photoActuelle['photo']);
            }
            $uniqueName = uniqid('', true);
            $file = $uniqueName.".".$extension;
            move_uploaded_file($tmpName, './image/image_utilisateur/'.$file);
            $this->modele->modifierPhoto($file);
        }
        else{
           if(!in_array($extension, $extensions)){
              echo'mauvaise extension';
           }else if($size <= $maxSize){
              echo "fichier trop grand";
           }else{
              echo "Une erreur est survenue";
           }  
        }
    }
}

public function exec(){
    switch ($this->action){
        case "afficherProfil" :
            $this->afficherProfil();
            break;
        case "bienvenue" : 
            echo 'bienvenue';
            break;
    }
    global $affiche; 
    $affiche=$this->vue->getAffichage(); 
}

}

?>
