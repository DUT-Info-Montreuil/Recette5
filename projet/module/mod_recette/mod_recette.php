<?php
    require_once('cont_recette.php');
  
    class ModRecette{
 
        public $con;
        
        public   function __construct() {
        
        
            $this->con=new ContRecette;
            $this->con->exec();
        }   
     
    }
?>