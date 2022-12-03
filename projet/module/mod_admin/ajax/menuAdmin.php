<?php
$menu= 





$this->menu=
            '<nav id="navbar" class="navbar navbar-expand-xxl navbar-dark bg-dark" aria-label="Seventh navbar example">
                <div class="container-fluid">
                <a class="navbar-brand" href="index.php?module=connexion&action=bienvenue"><img id="logo" alt="logo du site" src="image/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div  class="collapse navbar-collapse" id="navbarsExampleXxl" align="center">
                    <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?module=admin&action=gererUtilisateur">Gérer utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="index.php?module=connexion&action=bienvenue">Espace utilisateur</a>
                    </li>
                   
            </nav>';

       
?>
<script>


$(document).ready(function(){  


    $('#header').empty().append(<?php echo json_encode($menu) ; ?>);
   
 });


 
     </script>
