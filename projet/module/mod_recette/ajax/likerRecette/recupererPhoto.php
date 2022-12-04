<?php
extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    $sth=$bdd->prepare("SELECT photo from photo natural join Recette WHERE idRecette = ?");
    $sth->execute(array($idRecette));
    $row = $sth->fetch();
    unlink("image/image_recette/".$row['photo']); 
   
 
?>