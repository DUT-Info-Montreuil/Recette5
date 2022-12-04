<?php
header('Content-Type: application/json; charset=utf-8');



extract($_POST);

    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    $sth = $bdd->prepare("SELECT * from sousCategorie  where idCategorie=?");
    $sth->execute(array($test));
    $row=$sth->fetchAll();
    echo json_encode($row);
?>