<?php
    require_once('cont_admin.php');
  
    class ModAdmin{
 
        public $con;
        
        public   function __construct() {
        
        
            $this->con=new ContAdmin;
            $this->con->exec();
        }   
     
    }
?>