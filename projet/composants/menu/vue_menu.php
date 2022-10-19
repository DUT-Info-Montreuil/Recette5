<?php

class VueMenu{
     private $menu;
    public function __construct(){

    }

    public function menu(){
       $this->menu =  '<a href="index.php?module=equipe">Module Equipe</a>
        <a href="index.php?module=joueur">Module Joueur</a>
        <a href="index.php?module=connexion">Module Connexion</a>';
            if($_SESSION['login'] != null){
               $this->menu= $this->menu."\n". '<a href="index.php?module=connexion&action=deconnexion">Deconnexion</a></br>';
            }else{
                $this->menu = $this->menu."\n".'<a href="index.php?module=connexion&action=formulaireC">Connexion</a></br>';
            }
            
        return $this->menu;
    }

}
?>