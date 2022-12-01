<?php



header('Content-Type: application/json; charset=utf-8');

session_start();


extract($_POST);

$bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
    if(isset($vegan)){
        $vegan='1';
     }else{
        $vegan='0';
     }  
   $tpsPreparration = $heure*60 + $min;

     $sth = $bdd->prepare("INSERT INTO `Recette` (`idRecette`, `titre`, `tpsPreparration`, `datePublication`, `description`, `noteAnnexe`, `vegan`, `idUtilisateur`) VALUES (NULL, ?, ?, now(), ?, ?, ?, ?)");
     $sth->execute(array($titre,$tpsPreparration,$description,$annexe,$vegan,$_SESSION['id']));
     $sth = $bdd->prepare("SELECT MAX(idRecette) FROM Recette WHERE Recette.idUtilisateur=?");
     $sth->execute(array($_SESSION['id']));
 
     $row = $sth->fetch();
  
     for ($i=1; $i <=$nbingredient ; $i++) { 
        
        $ingredient=${"ingredient$i"};
        $quantite= ${"quantite$i"};
        $unite= ${"unite$i"};
        $sthh=$bdd->prepare("INSERT INTO `Utiliser` (`idRecette`, `idIngredient`, `Quantite`, `unite`) VALUES (?, ?, ?, ?)");
        $sthh->execute(array($row['MAX(idRecette)'],$ingredient ,$quantite,$unite));
       
     }

      if($_FILES['file_photoRecette']['name']!=""){
         $tmpName = $_FILES['file_photoRecette']['tmp_name'];
         $name = $_FILES['file_photoRecette']['name'];
         $size = $_FILES['file_photoRecette']['size'];
         $error = $_FILES['file_photoRecette']['error'];
         $tabExtension = explode('.', $name);
         $extension = strtolower(end($tabExtension));
         $extensions = ['jpg', 'png', 'jpeg', 'gif'];
         $maxSize = 9000000000000000;

         $sthr = $bdd->prepare("SELECT MAX(idRecette) FROM Recette ");
         $sthr->execute();
         $rowr = $sthr->fetch();
            
         $sth2p = $bdd->prepare("SELECT MAX(idRecette) FROM photo");
         $sth2p->execute();
         $row2p = $sth2p->fetch();


         if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0 && $rowr['MAX(idRecette)'] != $row2p['MAX(idRecette)']){

            $uniqueName = uniqid('', true);
            $file = $uniqueName.".".$extension;
            move_uploaded_file($tmpName, '../../../../image/image_recette/'.$file);
            $sthh=$bdd->prepare("INSERT INTO `photo` (`idPhoto`, `photo`, `idRecette`) VALUES (NULL, ?, ?)");

            $sthh->execute(array($file,$row['MAX(idRecette)']));
            
         }
      
            
      }else{
         $sthh=$bdd->prepare("INSERT INTO `photo` (`idPhoto`, `photo`, `idRecette`) VALUES (NULL, NULL, ?)");
            $sthh->execute(array($row['MAX(idRecette)']));
      }

      if($plat!=NULL){
         $sthC = $bdd->prepare("INSERT INTO `Categorie` (nom,idRecette) VALUES (?,?)");
         $sthC->execute(array($plat,$row['MAX(idRecette)']));
      }

      if($dessert!=NULL){
         $sthC = $bdd->prepare("INSERT INTO `Categorie` (nom,idRecette) VALUES (?,?)");
         $sthC->execute(array($dessert,$row['MAX(idRecette)']));
      }
      

echo 4;

?>