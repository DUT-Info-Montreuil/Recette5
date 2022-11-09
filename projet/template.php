<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<title>Recette5</title>
        <link rel="stylesheet" href="css.css"/>
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