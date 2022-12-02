<?php 

header('Content-Type: application/json; charset=utf-8');
session_start();


extract($_POST);
$bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
    
    $sth=$bdd->prepare("DELETE FROM commentaire WHERE idCommentaire=?");
    $sth->execute(array($idCommentaire));
    $row = $sth->fetch();
    echo 4;







?>