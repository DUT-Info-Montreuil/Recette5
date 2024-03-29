<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="iziToast.css">
    <title> Recette5</title>
    <link rel="shortcut icon" href="image/logo.png" />
    <link rel="stylesheet" href="css.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script> const Notif = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: false,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>



    <?php include('composants/menu/ajax/barreRecherche.php'); ?>
</head>

<body>
    <div class="containers">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
        <header id="header">
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

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 ">
            <div id="divf" align="center"></div>
            <p class="col-md-4 mb-0 text-muted">GNU GPL &copy; 2022 Recette5, 2022-2032 </br> Initiated by Emilio &
                Priyank</p>

            <a href="index.php?module=connexion&action=bienvenue"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="image/logo.png" width="32" height="32">
            </a>

            <ul class="nav col-md-4 justify-content-end" id="liste">
                <li class="nav-item"><a href="index.php?module=connexion&action=bienvenue"
                        class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"></a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"></a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"></a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"></a></li>
            </ul>
        </footer>
    </div>
</body>

</html>
<!----------------
Version 1.0 - 2022/12/5
GNU GPL Copyleft © 2022-2032 
Initiated by Emilio & Priyank
Web Site = <https://Recette5>
------------------>