<?php
    require_once('cont_recherche.php');
  
    class ModRecherche{
 
        public $con;
        
        public   function __construct() {
        
        
            $this->con=new ContRecherche;
            $this->con->exec();
        }   
     
    }
?>