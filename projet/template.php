<!DOCTYPE html>

<html lang="fr">
<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
		<title>Recette5</title>
        <link rel="stylesheet" href="css.css"/>
        <script > 
         setInterval('load_nblikes()',500);
         function load_nblikes(){
            
            $('#nbLike').load('module/mod_recette/ajax/Nblike.php?id=<?php echo$_GET['idRecette'];?>');

         }
   </script>
	</head>
	<body>
        <header>
           
            <?php  
            $compLogo->affichage();
            $compMenu->affichage();
            ?>
		</header>	
        <main>	
            <?php
                global $affiche;
                echo $affiche;
            ?>
        </main>
		<footer>
            <p>réalisé par Priyank SOLANKI et Emilio CYRIAQUE en 2ème année de BUT Informatique</p>
		</footer>

	</body>
</html>