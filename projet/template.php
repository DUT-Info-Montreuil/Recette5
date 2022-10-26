<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Recette5</title>
        <link rel="stylesheet" href="css.css"/>
	</head>
	<body>
        <header>
            <h1 id="titre">Recette5</h1>
            <?php  
            $compLogo->affichage();
            ?> 
            
            <div>
            <?php 
                $compMenu->affichage();
            ?>
            </div>
		</header>	
        <main>	
            <?php
                global $affiche;
                echo $affiche;
            ?>
        </main>
		<footer>
            <p>site sae </p>
		</footer>

	</body>
</html>