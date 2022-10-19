<?php

   require_once('vue_connexion.php');
   require_once('modele_connexion.php');
      class ContConnexion{
         private $vue; 
         private $modele;
         private $action; 
      public function __construct() {
         $this->vue=new VueConnexion();
         $this->modele=new ModeleConnexion();
         $this->action=isset($_GET['action']) ?$_GET['action']:"bienvenue";
      }

      public function afficher_form_inscription(){
         $this->vue->afficher_form_inscription();
      }

      public function ajouter_dans_inscription($login,$mdp,$email){
         $this->modele->inscrire_dans_la_BD($login,$mdp,$email);
      }

      public function afficher_form_connexion(){
         $this->vue->afficher_form_connexion();
      }

      public function connexion_dans_inscription($login,$mdp){
         $this->modele->connexion_dans_la_BD($login,$mdp);
      }
       
      public function exec(){     
         switch ($this->action) {
            case "AfficherFormulaireInscription": 
               $this->afficher_form_inscription();
               break;
            case "inscription":
               $login=isset($_POST['login']) ?$_POST['login']:"";
               $mdp=isset($_POST['mdp']) ?$_POST['mdp']:"";
               $email=isset($_POST['email']) ?$_POST['email']:"";
               $this->ajouter_dans_inscription( htmlspecialchars($login),htmlspecialchars($mdp),htmlspecialchars($email));   
               break;
            case "AfficherFormulaireConnexion": 
               $this->afficher_form_connexion();
               break;
            case "connexion":       
               $login=isset($_POST['login']) ?$_POST['login']:"";
               $mdp=isset($_POST['mdp']) ?$_POST['mdp']:"";    
               $this->connexion_dans_inscription( htmlspecialchars($login),htmlspecialchars($mdp));       
               break;
            case "deconnexion":               
               unset($_SESSION['login']);
               break;
            case "bienvenue":
               echo 'bienvenue';
               break;  
         }      
         $this->vue->menu();
         global $affiche; 
         $affiche=$this->vue->getAffichage();   
   } 
}
?>