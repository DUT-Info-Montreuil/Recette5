<?php



header('Content-Type: application/json; charset=utf-8');

session_start();


extract($_POST);
if($token==$_SESSION['token']&& time() - $_SESSION['token_date'] < 9000){
$bdd=new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201631','dutinfopw201631','mudepuna');
    if(isset($vegan)){
        $vegan='1';
     }else{
        $vegan='0';
     }
     
     if($heure==0 && $min==0){
        $sth = $bdd->prepare("UPDATE `Recette` SET `titre` = ?, `description` = ?, `noteAnnexe` = ?,`vegan` = ?  WHERE `Recette`.`idRecette` = ?;");
        $sth->execute(array($titre,$description,$annexe,$vegan,$idRecette));
      
        
     }else{
        $tpsPreparration = $heure*60 + $min;
        $sth = $bdd->prepare("UPDATE `Recette` SET `titre` = ?, `tpsPreparration` = ?, `description` = ?, `noteAnnexe` = ?, `vegan` = ? WHERE `Recette`.`idRecette` = ?");
        $sth->execute(array($titre,$tpsPreparration,$description,$annexe,$vegan,$idRecette));
  
     }
   


     for ($i=1; $i <=$nbingredient ; $i++) { 
        
        $ingredient=${"ingredient$i"};
        $quantite= ${"quantite$i"};
        $unite= ${"unite$i"};
        $sthh=$bdd->prepare("INSERT INTO `Utiliser` (`idRecette`, `idIngredient`, `Quantite`, `unite`) VALUES (?, ?, ?, ?)");
        $sthh->execute(array($idRecette,$ingredient ,$quantite,$unite));
       
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



         if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0 ){

            $uniqueName = uniqid('', true);
            $file = $uniqueName.".".$extension;
            move_uploaded_file($tmpName, '../../../../image/image_recette/'.$file);

          //  recuperation de la photo
   
            $sth = $bdd->prepare("SELECT photo FROM photo where idRecette=? ");
            $sth->execute(array($idRecette));
            $anciennePhoto = $sth->fetch();
           
            unlink('../../../../image/image_recette/'.$anciennePhoto['photo']);
        //    modification de la photo
            $sth = $bdd->prepare("UPDATE photo SET photo=?  where photo=? ");
            $sth->execute(array($file,$anciennePhoto['photo']));
          
            
         }
         unset($_SESSION['token']);
         unset( $_SESSION['token_date']);
}

         // $sth = $bdd->prepare("UPDATE Appartenir SET idCategorie=?, idSousCategorie=?  where idRecette=? ");// /
         // $sth->execute(array($cat,$sousCat,$idRecette));
    echo 4;
}else{
   echo 5;
}
