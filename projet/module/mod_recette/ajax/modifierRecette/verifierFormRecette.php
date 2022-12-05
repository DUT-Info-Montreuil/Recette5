<?php
        header('Content-Type: application/json; charset=utf-8');
        session_start();


        extract($_POST);


        //------------cas ajout de recette ----------------------/
     
                    

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
                    echo json_encode('<div class="alert alert-danger" role="alert">La recette doit comporter un titre</div>');

                else if($description=="")
                    echo json_encode('<div class="alert alert-danger" role="alert">La recette doit comporter une description</div>');

                else if( strlen($description) > 1000)
                    echo json_encode('<div class="alert alert-danger" role="alert">La taille de la description est trop grande seulement 1000 caratères sont autorisé</div>');

                else if(!in_array($extension, $extensions) && $_FILES['file_photoRecette']['name']!=""){
                            echo json_encode('<div class="alert alert-danger" role="alert">mauvaise extension veuillez mettre une photo en .jpg .png .jpeg </div>');
                }
                else if($size > $maxSize  && $_FILES['file_photoRecette']['name']!=""){
                            echo json_encode('<div class="alert alert-danger" role="alert">fichier trop grand');
                }
                else if($error != 0 && $_FILES['file_photoRecette']['name']!=""){
                            echo json_encode('<div class="alert alert-danger" role="alert">La photo ne peut pas etre pris en compte veuillez selectionner une notre photo</div>');
                }
                else{ 
                    echo json_encode("bon");
                }        
        






?>