<!DOCTYPE html>

<html lang="fr">
<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
		<title>Recette5</title>
        <link rel="stylesheet" href="css.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <?php include('module/mod_recette/ajax/fonctionAjax.php');?>
	</head>
	<body>
        <div class="containers">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <header>
            <?php  
            $compMenu->affichage();
            ?>
		</header>	
        <main id="main">	
            <?php
                global $affiche;
                echo $affiche;
            ?>
        </main>
		<footer>
            <p>réalisé par Priyank SOLANKI et Emilio CYRIAQUE en 2ème année de BUT Informatique</p>
		</footer>
        </div>
	</body>
</html>