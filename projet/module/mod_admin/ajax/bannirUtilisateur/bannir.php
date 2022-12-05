<?php 

header('Content-Type: application/json; charset=utf-8');
session_start();
extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
    $sth2=$bdd->prepare("SELECT Utilisateurs.idUtilisateur,Detenir.valeur FROM Utilisateurs NATURAL JOIN Detenir NATURAL JOIN droit where Utilisateurs.idUtilisateur=? AND droit.idDroit=2 ");
    $sth2->execute(array($_SESSION['id']));
    $row= $sth2->fetch();

if($row['valeur']==1){
    $sth = $bdd->prepare("UPDATE `Utilisateurs` SET `banni` = 1 WHERE `Utilisateurs`.`idUtilisateur` = ?");
    $sth->execute(array($idUtilisateur));
    $row = $sth->fetch();
    echo 4;
}else{
    echo 5;
}








?>