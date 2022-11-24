

<?php

extract($_POST);

$bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');

    $sth = $bdd->prepare("SELECT idUtilisateur_1 FROM EtreAmis where idUtilisateur_1=? and idUtilisateur=?");
    $sth->execute(array($idUtilisateur, $profil));
    $row = $sth->fetch();
    
    if($row == NULL)
        echo '0';
    else    
        echo '1';
  
?>