<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    
    $sth=$bdd->prepare("UPDATE `DonnerAvis` SET `aime` = '0' WHERE `DonnerAvis`.`idUtilisateur` = ? AND `DonnerAvis`.`idRecette` = ?;");
    $sth->execute(array($idUtilisateur,$idRecette));
   
 
?>