<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    $sth=$bdd->prepare("SELECT titre,idRecette,photo FROM Recette natural join photo WHERE titre LIKE ?");
    $sth->execute(array($titre.'%'));
    $row = $sth->fetchAll();
    if($row==null)
        echo json_encode("vide");
    else
        echo json_encode($row);

?>