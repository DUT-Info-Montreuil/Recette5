<?php

extract($_POST);
 session_start();
$idUtilisateur=$_SESSION['id'];

      $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
     // on verifie si un avis existe
      $sth=$bdd->prepare("SELECT * FROM DonnerAvis WHERE idUtilisateur=?AND idRecette=?");
      $sth->execute(array($idUtilisateur,$idRecette));
      $row = $sth->fetch();
      if($row==null){
         $sth=$bdd->prepare("INSERT INTO `DonnerAvis` (`idUtilisateur`, `commentaire`, `idRecette`) VALUES (?,?,?);");
         $sth->execute(array($idUtilisateur,$commentaire,$idRecette));
         echo 1;
      }
    
      
      else{    $sth=$bdd->prepare("UPDATE `DonnerAvis` SET `commentaire` = ? WHERE `DonnerAvis`.`idUtilisateur` = ? AND `DonnerAvis`.`idRecette` = ?;");
         $sth->execute(array($commentaire,$idUtilisateur,$idRecette));
         echo 2;
      }
 

     
 
?>