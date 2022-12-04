<?php

   require_once('vue_recherche.php');
   require_once('modele_recherche.php');
      class ContRecherche{
         private $vue; 
         private $modele;
         private $action; 
      public function __construct() {
         $this->vue=new VueRecherche();
         $this->modele=new ModeleRecherche();
         $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
        

         
      }


    public function exec(){     
        switch ($this->action) {
        
           case "bienvenue":
              echo 'bienvenue';
             break;  
           case "toute":
               $this->afficherRecette();


             include('module\mod_recette\ajax\ajouterCategorie\fonctionRechercherCategorie.php');
             break;
        }      
        global $affiche; 
        $affiche=$this->vue->getAffichage();   
    } 

    public function afficherRecette(){
      if(isset($_GET['idCategorie']))
         $recette = $this->modele->touteRecetteCat($_GET['idCategorie']);
      else if(isset($_GET['idSousCategorie']))
         $recette = $this->modele->touteRecetteSousCat($_GET['idSousCategorie']);
      else if(isset($_GET['vegan']))
         $recette = $this->modele->touteRecetteVegan();
      else
         $recette = $this->modele->touteRecette();
      
      $this->vue->afficherRecette($recette);
    }
}
?>