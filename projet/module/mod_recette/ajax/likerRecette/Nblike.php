

<?php

extract($_POST);

$bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    $sth = $bdd->prepare("SELECT count(aime) FROM DonnerAvis where idRecette=? and aime=true ");
    $sth->execute(array($idRecette));
    $row = $sth->fetch();
    
    echo $row['count(aime)'];
    
  
?>