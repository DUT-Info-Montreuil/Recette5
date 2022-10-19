<?php

class VueMenu{
     private $menu;
    public function __construct(){

    }

    public function menu(){
       $this->menu =  '
        <a href="index.php?module=connexion">Module Connexion</a>';
            if($_SESSION['login'] != null){
               $this->menu= $this->menu."\n". '<a href="index.php?module=connexion&action=deconnexion">Deconnexion</a></br>';
            }else{
                $this->menu = $this->menu."\n".'<a href="index.php?module=connexion&action=AfficherFormulaireConnexion">Connexion</a></br>';
            }
            
        return $this->menu;
    }

}
?>