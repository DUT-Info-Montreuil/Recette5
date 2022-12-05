<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');


    $sth=$bdd->prepare("DELETE FROM Recette WHERE idRecette = ?");
    $sth->execute(array($idRecette));
   
 
?>