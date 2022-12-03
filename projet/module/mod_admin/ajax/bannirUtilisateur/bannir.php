<?php 

header('Content-Type: application/json; charset=utf-8');



extract($_POST);
$bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    $sth = $bdd->prepare("UPDATE `Utilisateurs` SET `banni` = 1 WHERE `Utilisateurs`.`idUtilisateur` = ?");
    $sth->execute(array($idUtilisateur));
    $row = $sth->fetch();
    echo 4;







?>