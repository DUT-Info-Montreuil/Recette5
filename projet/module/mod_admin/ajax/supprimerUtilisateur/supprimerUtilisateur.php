<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    $sth2=$bdd->prepare("DELETE FROM DonnerAvis WHERE idUtilisateur = ?");
    $sth2->execute(array($idUtilisateur));

    $sth2=$bdd->prepare("DELETE photo FROM photo NATURAL join Recette WHERE idUtilisateur=?");
    $sth2->execute(array($idUtilisateur));

    $sth2=$bdd->prepare("DELETE FROM Utiliser WHERE idUtilisateur = ?");
    $sth2->execute(array($idUtilisateur));

    $sth2=$bdd->prepare("DELETE FROM commentaire WHERE idUtilisateur = ?");
    $sth2->execute(array($idUtilisateur));
    
    $sth=$bdd->prepare("DELETE FROM Recette WHERE idUtilisateur = ?");
    $sth->execute(array($idUtilisateur));

    $sth=$bdd->prepare("DELETE FROM Utilisateurs WHERE idUtilisateur = ?");
    $sth->execute(array($idUtilisateur));

 
?>