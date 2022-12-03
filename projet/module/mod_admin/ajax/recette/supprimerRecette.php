<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    $sth2=$bdd->prepare("DELETE FROM DonnerAvis WHERE idRecette = ?");
    $sth2->execute(array($idRecette));

    $sth2=$bdd->prepare("DELETE FROM photo  WHERE idRecette = ?");
    $sth2->execute(array($idRecette));

    $sth2=$bdd->prepare("DELETE FROM Utiliser WHERE idRecette = ?");
    $sth2->execute(array($idRecette));

    $sth2=$bdd->prepare("DELETE FROM commentaire WHERE idRecette = ?");
    $sth2->execute(array($idRecette));
    
    $sth=$bdd->prepare("DELETE FROM Recette WHERE idRecette = ?");
    $sth->execute(array($idRecette));
   
 
?>