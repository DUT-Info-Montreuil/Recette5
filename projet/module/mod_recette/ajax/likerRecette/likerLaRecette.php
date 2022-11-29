<?php

extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
    //on verifie si un avis existe
    $sth=$bdd->prepare("SELECT * FROM DonnerAvis WHERE idUtilisateur=?AND idRecette=?");
    $sth->execute(array($idUtilisateur,$idRecette));
    $row = $sth->fetch();

    if($row==null){
        $sth=$bdd->prepare("INSERT INTO `DonnerAvis` (`idUtilisateur`, `aime`, `idRecette`) VALUES (?,1,?);");
        $sth->execute(array($idUtilisateur,$idRecette));
     }
     
     else{

        $sth=$bdd->prepare("UPDATE `DonnerAvis` SET `aime` = '1' WHERE `DonnerAvis`.`idUtilisateur` = ? AND `DonnerAvis`.`idRecette` = ?;");
        $sth->execute(array($idUtilisateur,$idRecette));
     }
 
?>