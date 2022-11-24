<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
        $sth=$bdd->prepare("INSERT INTO EtreAmis  VALUES (?,?)");
        $sth->execute(array($profil,$idUtilisateur));
     
     
 
?>