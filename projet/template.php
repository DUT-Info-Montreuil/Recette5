<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Recette5</title>
        <link rel="stylesheet" href="css.css"/>
	</head>
	<body>
        <header>   
            <h1>Recette5</h1>
            <?php 
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
		</footer>

	</body>
</html>