

<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
    $sth = $bdd->prepare("SELECT count(aime) FROM DonnerAvis where idRecette=? and aime=true ");
    $sth->execute(array($_GET['id']));
    $row = $sth->fetch();
    
    echo'nblike <br>'.$row['count(aime)'];
  
?>