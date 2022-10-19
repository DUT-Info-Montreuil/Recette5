<?php
require_once('vue_menu.php');
require_once('modele_menu.php');
class ContMenu{
    private $vue;
    private $mod;
    public function __construct(){
        $this->vue = new VueMenu();
        $this->mod = new ModeleMenu();
    }

    public function getAffichage(){
        return $this->vue->menu();
    }
}


?>