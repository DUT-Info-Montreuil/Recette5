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
    $this->vue->afficherProfil($this->modele->profil(), $this->modele->touteMesRecettes() );
    
}

public function afficherFormModifierProfil(){
    $this->vue->modifierProfil($this->modele->profil());
    
    
}

public function validerModification(){
    $this->vue->validationModification();
    $this->modifierPhoto($_FILES);
    $this->modifierDescriptionProfil();
    $this->modifierNomProfil();
    $this->modifierMotDePasse();
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
        }
    }
}

public function modifierDescriptionProfil(){
    $newDes = $_POST['description'];
    if($newDes != NULL)
        $this->modele->modifierDescription($newDes);
}

public function modifierNomProfil(){
    $newNom = $_POST['nom'];
    if($newNom!=NULL){
        $this->modele->modifierNomProfil($newNom);
    }
}

public function modifierMotDePasse(){
    $oldMDP = $_POST['oldmdp'];
    $newMDP = $_POST['newmdp'];
    $newMDPC = $_POST['newmdpc'];
    if($oldMDP!=NULL && $newMDP!=NULL && $newMDPC!=NULL){
        $this->modele->modifierMotDePasse($oldMDP , $newMDP , $newMDPC);
    }
}

public function afficherProfilUtilisateur($pro){
    $this->vue->afficherProfil($this->modele->profilId($pro), $this->modele->touteRecetteUtilisateur());
}

public function ajouterAmis($idAmis){
    $this->modele->ajouterAmi($idAmis);
}

public function voirAmis(){
    $this->vue->voirAmis($this->modele->voirAmis());
}

public function exec(){
    switch ($this->action){
        case "afficherProfil" :
            $this->afficherProfil();
            
            break;
        case "modifierProfil" :
            $this->afficherFormModifierProfil();
            break;
        case "validerProfil" :
            $this->validerModification();
            break;
        case "afficherProfilUtilisateur" :
            $this->afficherProfilUtilisateur($_GET['idUtilisateur']);
            break;
        case "ajouterAmis" :
            $this->ajouterAmis($_GET['id']);
            echo 'Cette utilisateur est desormais votre ami';
            break;
        case "listeAmis" :
            $this->voirAmis();
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
