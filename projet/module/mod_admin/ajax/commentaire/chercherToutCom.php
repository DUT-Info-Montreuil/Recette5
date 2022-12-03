<?php 

header('Content-Type: application/json; charset=utf-8');



extract($_POST);
$bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

        $sth = $bdd->prepare(' SELECT c.idCommentaire,c.commentaire,c.idUtilisateur,c.dateAjout,c.heureAjout,u.login,u.photo  FROM commentaire c NATURAL JOIN Utilisateurs u ');
        $sth->execute();
        $row = $sth->fetchAll();
    echo json_encode($row);







?>