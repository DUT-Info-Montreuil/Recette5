<?php
session_start();
extract($_POST);
    $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
    $sth2=$bdd->prepare("SELECT Utilisateurs.idUtilisateur,Detenir.valeur FROM Utilisateurs NATURAL JOIN Detenir NATURAL JOIN droit where Utilisateurs.idUtilisateur=? AND droit.idDroit=1 ");
    $sth2->execute(array($_SESSION['id']));
    $row= $sth2->fetch();

    if($row['valeur']==1){
        $sth2=$bdd->prepare("DELETE FROM DonnerAvis WHERE idUtilisateur = ?");
        $sth2->execute(array($idUtilisateur));
    
        $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
        $sth=$bdd->prepare("SELECT photo FROM photo NATURAL join Recette WHERE idUtilisateur=?");
        $sth->execute(array($idUtilisateur));
        $row = $sth->fetchAll();
    
        foreach($row as $value){
            unlink('../../../../image/image_recette/'.$value['photo'].'');
        }
    
        $sth2=$bdd->prepare("DELETE photo FROM photo NATURAL join Recette WHERE idUtilisateur=?");
        $sth2->execute(array($idUtilisateur));
    
        $sth2=$bdd->prepare("DELETE FROM Utiliser WHERE idUtilisateur = ?");
        $sth2->execute(array($idUtilisateur));
    
        $sth2=$bdd->prepare("DELETE FROM commentaire WHERE idUtilisateur = ?");
        $sth2->execute(array($idUtilisateur));
        
        $sth=$bdd->prepare("DELETE FROM Recette WHERE idUtilisateur = ?");
        $sth->execute(array($idUtilisateur));
    
        $sth=$bdd->prepare("DELETE FROM Utilisateurs WHERE idUtilisateur = ?");
        $sth->execute(array($idUtilisateur));
        echo 4;
    }else{
        echo 5;
    }
   
 
?>