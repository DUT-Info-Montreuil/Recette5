<?php
    require_once('cont_connexion.php');
  
    class ModConnexion{
 
        public $con;
        
        public   function __construct() {
        
        
            $this->con=new ContConnexion;
            $this->con->exec();
        }   
     
    }
?>