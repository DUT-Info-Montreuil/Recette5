<?php

require_once('vue_logo.php');
require_once('modele_logo.php');
class ContLogo{
    private $vue;
    private $mod;
    public function __construct(){
        $this->vue = new VueLogo();
        $this->mod = new ModeleLogo();
    }

    public function getAffichage(){
        return $this->vue->logo();
    }
}

?>