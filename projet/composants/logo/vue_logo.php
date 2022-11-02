<?php

class VueLogo{
     private $logo;
    public function __construct(){

    }

    public function logo(){
        $this->logo = '<a href="index.php?module=connexion&action=bienvenue"><img id="logo" alt="logo du site" src="image/logo.png"></a>';
        return $this->logo;
    }

}
?>