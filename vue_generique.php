<?php

require_once('vue_generique.php');
  class VueGenerique{
    public   function __construct() {
        ob_start();
     
    }
  
    public function getAffichage(){
    
        return  ob_get_clean();
    }

}

?>