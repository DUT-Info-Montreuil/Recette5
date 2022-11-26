<?php
header('Content-Type: application/json; charset=utf-8');



extract($_POST);

if($titre=="")
    echo 1;
else if($tpsPreparration=="")
    echo 2;
else if($description=="")
    echo 3;
else{
    
    // $bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
    // if(isset($vegan)){
    //     $vegan='1';
    //  }else{
    //     $vegan='0';
    //  }  
    //  $sth = $bdd->prepare("INSERT INTO `Recette` (`idRecette`, `titre`, `tpsPreparration`, `datePublication`, `description`, `noteAnnexe`, `vegan`, `idUtilisateur`) VALUES (NULL, ?, ?, now(), ?, ?, ?, ?)");
    //  $sth->execute(array($titre,$tpsPreparration,$description,$annexe,$vegan,$idutilisateur));
    //  $sth = $bdd->prepare("SELECT MAX(idRecette) FROM Recette WHERE Recette.idUtilisateur=?");
    //  $sth->execute(array($idutilisateur));
 
    //  $row = $sth->fetch();
  
    //  for ($i=1; $i <=$nbIngredient ; $i++) { 
        
    //     $ingredient=${"ingredient$i"};
    //     $quantite= ${"quantite$i"};
    //     $unite= ${"unite$i"};
    //     $sthh=$bdd->prepare("INSERT INTO `Utiliser` (`idRecette`, `idIngredient`, `Quantite`, `unite`) VALUES (?, ?, ?, ?)");
    //     $sthh->execute(array($row['MAX(idRecette)'],$ingredient ,$quantite,$unite));
       
    //  }
    echo 4;
}      
   
 
    
?>