<?php

extract($_POST);
 session_start();
$idUtilisateur=$_SESSION['id'];
if($commentaire=="" || empty($commentaire)){
      echo json_encode("vide");
}else{
      $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
   

      $sth=$bdd->prepare("INSERT INTO `commentaire` (`idCommentaire`, `commentaire`, `idUtilisateur`, `idRecette`, `dateAjout`, `heureAjout`) VALUES (NULL, ?,?,?, now(), curtime());");
      $sth->execute(array($commentaire,$idUtilisateur,$idRecette));
 
      $sth = $bdd->prepare("SELECT MAX(idCommentaire) FROM commentaire ");
      $sth->execute();
      $row = $sth->fetch();

      $sth = $bdd->prepare("SELECT commentaire,photo,login,heureAjout,dateAjout,idCommentaire FROM commentaire NATURAL JOIN Utilisateurs where idCommentaire=? ");
      $sth->execute(array($row['MAX(idCommentaire)']));
      $row2 = $sth->fetch();
      echo json_encode($row2);
}
    
   

     
 
?>