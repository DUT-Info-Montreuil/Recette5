<?php

     function creation_token() {
        $bytes = random_bytes(20);
        $_SESSION['token'] = bin2hex($bytes);
        $_SESSION['token_date'] = time();
    }

    function verifierToken($token){
      return  $token==$_SESSION['token']&& time() - $_SESSION['token_date'] < 90000;
       
    }
    
   
    function supprimerToken(){
        unset($_SESSION['token']);
        unset( $_SESSION['token_date']);
       
    }
?>