<?php

class VueMenu{
     private $menu;
    public function __construct(){

    }

    public function menu(){
            if($_SESSION['login'] != null){
            
            $this->menu=
            '<nav>
                <div class="nav">
                    <div id="lien" class="onglets">
                        <a href="index.php?module=connexion&action=bienvenue">Acceuil</a>
                        <a href="index.php?module=recherche&action=toute">Recette</a>
                        <a href="index.php?module=recette&action=choisirNbIngredient">Ajouter Recette</a>
                        <a href="index.php?module=recette&action=afficherMesRecette">Mes Recettes</a>
                        <a href="index.php?module=recette&action=afficherLiker">Aimé</a>
                    </div>
                    <div id="lien" class="profil">
                        <a href="index.php?module=profil&action=listeAmis">Amis</a>
                        <a href="index.php?module=profil&action=afficherProfil">Profil</a>
                        <a href="index.php?module=connexion&action=deconnexion">Deconnexion</a>
                    </div>
                </div>
            </nav>';

           
            }else{

             $this->menu=  
             '<nav>
                <div class="nav">
                    <div id="lien" class="onglets">
                        <a href="index.php?module=connexion&action=bienvenue">Acceuil</a>
                        <a href="index.php?module=recherche&action=toute">Recette</a>
                    </div>
                    <div id="lien" class="profil">
                        
                        <a href="index.php?module=connexion&action=AfficherFormulaireConnexion">Connexion</a>
                        <a href="index.php?module=connexion&action=AfficherFormulaireInscription">Inscription</a>
                      
                    </div>
                </div>
             </nav>';
      
            }
            
            
        return $this->menu;
    }

}
?>