<?php
    require_once('cont_profil.php');
  
    class ModProfil{
 
        public $con;
        
        public   function __construct() {
        
        
            $this->con=new ContProfil;
            $this->con->exec();
        }   
     
    }
?>