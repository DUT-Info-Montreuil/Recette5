<?php
header('Content-Type: application/json; charset=utf-8');
session_start();


extract($_POST);




if(isset($_FILES['file_photoRecette']['name'])){
   
    $tmpName = $_FILES['file_photoRecette']['tmp_name'];
    $name = $_FILES['file_photoRecette']['name'];
    $size = $_FILES['file_photoRecette']['size'];
    $error = $_FILES['file_photoRecette']['error'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    $extensions = ['jpg', 'png', 'jpeg'];
    $maxSize = 2000000;
   
}    

if($titre=="")
    echo json_encode('pas de titre');
else if($tpsPreparration==""  ||!is_numeric($tpsPreparration))
    echo json_encode('Veuillez mettre un temps de préparation valide');
else if($description=="")
    echo json_encode('Veuillez mettre une description');

else if(!in_array($extension, $extensions) && $_FILES['file_photoRecette']['name']!=""){
            echo json_encode('mauvaise extension veuillez mettre une photo jpg png jpeg ');
}
else if($size > $maxSize  && $_FILES['file_photoRecette']['name']!=""){
            echo json_encode("fichier trop grand");
}else if($error != 0 && $_FILES['file_photoRecette']['name']!=""){
            echo json_encode("Une erreur est survenue");
}else{ 
    echo json_encode("bon");
}      
   

       
    
    







?>