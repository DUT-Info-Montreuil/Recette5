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
      $nbR= ($_GET['page']-1)*8;
      
      if(isset($_GET['idCategorie'])){
         $recette = $this->modele->touteRecetteCat($_GET['idCategorie'],$nbR);
         $url ='index.php?module=recherche&action=toute&idCategorie='.$_GET['idCategorie'];
         $nbPage = $this->modele->nbPageCat($_GET['idCategorie']);
      }

      else if(isset($_GET['idSousCategorie'])){
         $recette = $this->modele->touteRecetteSousCat($_GET['idSousCategorie'],$nbR);
         $url ='index.php?module=recherche&action=toute&idSousCategorie='.$_GET['idSousCategorie'];
         $nbPage = $this->modele->nbPageSousCat($_GET['idSousCategorie']);
      }

      else if(isset($_GET['vegan'])){
         $recette = $this->modele->touteRecetteVegan($nbR);
         $url='index.php?module=recherche&action=toute&vegan=1';
         $nbPage = $this->modele->nbPageVegan();
      }

      else{
         $recette = $this->modele->touteRecette($nbR);
         $url='index.php?module=recherche&action=toute';
         $nbPage = $this->modele->nbPage();
      }
      
      $this->vue->afficherRecette($recette);
      if($nbPage!=1)
         $this->vue->nbPage($nbPage, $url); 
    }
}
?>