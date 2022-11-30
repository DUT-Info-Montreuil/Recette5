<?php 
session_start();
extract($_POST);
$tes=2;
$bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
// on verifie si un avis existe
 $sth=$bdd->prepare("SELECT commentaire FROM DonnerAvis WHERE idUtilisateur=?AND idRecette=?");
 $sth->execute(array($_SESSION['id'],$idRecette));
 $row = $sth->fetch();
 if($row['commentaire']!=null || $row['commentaire']!=""){
    echo "deja com";
    
 }else{
    echo "pas de com";
 }


?>