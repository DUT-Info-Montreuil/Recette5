<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
   
    $sth=$bdd->prepare("SELECT * FROM DonnerAvis WHERE idUtilisateur=?AND idRecette=?");
    $sth->execute(array($idUtilisateur,$idRecette));
    $row = $sth->fetch();
   
    if($row==null){
        echo'0';
     }else{
        if($row['aime']==1){
           echo'1';
        }else{
            echo'0';
        }
     }

?>