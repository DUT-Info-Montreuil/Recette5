<?php

   require_once('vue_admin.php');
   require_once('modele_admin.php');
      class ContAdmin{
         private $vue; 
         private $modele;
         private $action; 
      public function __construct() {
         $this->vue=new VueAdmin();
         $this->modele=new ModeleADmin();
         $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
      }

      
       public function acceuilAdmin(){
         $this->vue->afficherAcceuilAdmin();
       }


       public function gererUtilisateur(){

         $listeUtilisateur=$this->modele->RecupererTousLesUtilisateurs();

         $this->vue->afficherGererUtilisateur($listeUtilisateur);
       }

       public function gererCommentaire(){

         $listeCommentaire=$this->modele->RecupererTousLesCommentaires();

         $this->vue->afficherGererCommentaire($listeCommentaire);
       }

       public function afficherUtilisateur($idUtilisateur){

         $utilisateur=$this->modele->recupererToutSurUtilisateur($idUtilisateur);

         $this->vue->afficherUtilisateur($utilisateur);
       }

       public function gererRecette(){

         $listeRecette=$this->modele->TouteLesRecette();

         $this->vue->afficherTouteLesRecette($listeRecette);
       }
      public function exec(){   
         if($_SESSION['role']!=1){
            echo "
            <script> 
            
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Vous ne pouvez pas accéder a la partie admin :)',
                
              })
              setTimeout(
                function() 
                {
                   window.location.href = 'index.php?module=connexion&action=bienvenue';
                }, 1000);
            
            </script>
            
            
            ";
         }  else{
            include('module/mod_admin/ajax/menuAdmin.php');
            switch ($this->action) {

               case"acceuilAdmin":
   
                  $this->acceuilAdmin();
               break;
               case"gererUtilisateur":
   
                  $this->gererUtilisateur();
                  include('module/mod_admin/ajax/bannirUtilisateur/fonctionAjaxbannirUtilisateur.php');
               break;
               case"gererCommentaire":
   
                  $this->gererCommentaire();
                  include('module/mod_admin/ajax/commentaire/fonctionAjaxCommentaire.php');
               break;
               case"gererRecette";
                     $this->gererRecette();
                   include('module/mod_admin/ajax/recette/fonctionAjaxRecette.php');
               break;

               case"afficherUtilisateur":
   
                  $this->afficherUtilisateur($_GET['idUtilisateur']);
                  include('module/mod_admin/ajax/commentaire/fonctionAjaxCommentaire.php');
               break;
               
   
            }      
         }
         
         global $affiche; 
         $affiche=$this->vue->getAffichage();   
   } 
}
?>