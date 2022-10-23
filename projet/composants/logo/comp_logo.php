<?php
require_once('cont_logo.php');
class CompLogo{
    private $cont;
    public function __construct(){
        $this->cont = new ContLogo();
    }

    public function affichage(){
        echo $this->cont->getAffichage();
    }
}
?>