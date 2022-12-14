<?php
require_once ('vue_generique.php');

class VueRecette extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    /*------------afficher toutes les recettes-------------*/
    public function afficherMesRecette($tabR)
    {
        if ($tabR == NULL)
        {
            echo ' <div align="center"><p class="text-muted">Aucune recette</p></div> ';
        }
        else
        {
            foreach ($tabR as $value)
            {
                if ($value['photo'] != NULL)
                {
                    $photo = $value['photo'];
                }
                else
                {
                    $photo = 'plat.png';

                }
                echo '
                 <div class="col"> 
                  <div class="card shadow-sm">            
                     <img src="image/image_recette/' . $photo . '"  width="100%" height="225">          
                    <div class="card-body">
                    <h1 class="card-text">' . substr($value['titre'], 0, 15);
                if (strlen($value['titre']) > 15) echo '...';
                echo '</h1><p class="card-text">' . substr($value['description'], 0, 39);
                if (strlen($value['description']) > 39) echo '...';
                echo '</p>            
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                         <a href="index.php?module=recette&action=afficherMaRecette&idRecette=' . $value['idRecette'] . '"><button type="button" class="btn btn-sm btn-outline-secondary">Détails</button></a>';
                if ($value['vegan'] == 1)
                {
                    echo '<button type="button" class="btn btn-sm btn-success" disabled>Vegan</button>';
                }
                echo '</div>
                        <div class="text-group" color="black">
                        <small class="text-muted">';
                if (floor((htmlspecialchars($value['tpsPreparration']) / 60)) != 0) echo floor((htmlspecialchars($value['tpsPreparration']) / 60)) . 'h';
                echo (htmlspecialchars($value['tpsPreparration']) % 60) . 'min</small>
                        
                        </div>
                        <small class="text-muted">' . $value['datePublication'] . '</small>
                      </div>
                    </div>
                  </div>
                </div>  
                     
                
                
                ';
            }
        }
    }

    /*-----------------------afficher les détails d'une recette-----------------------*/
    public function afficherMaRecette($recette, $photo, $Ingredient, $commentaires, $categorie)
    {

        echo '
         <section class="py-5">
         <div class="container px-4 px-lg-5 my-5">
         <div class="row gx-4 gx-lg-5 align-items-center">
             <div class="col-md-6">';

        if (isset($_SESSION['id']) && $_SESSION['id'] == $recette['idUtilisateur']) echo '<a href="index.php?module=recette&action=AffichermodifierMaRecette&idRecette=' . htmlspecialchars($recette['idRecette']) . '"><button type="button" id="suppIngredient" class="btn btn-outline-primary" />Modifier</button></a>
                     <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#supprimer">Supprimer</button>
                    <div class="modal fade" id="supprimer" tabindex="-1" aria-labelledby="supprimer" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="supprimer" id="black">Voulez-vous vraiment supprimer cette recette ?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="supprimerRecette" >   
                           
                        </div>
                        </div>
                    </div>
                    </div>';
        else echo '<a href="index.php?module=profil&action=afficherProfilUtilisateur&idUtilisateur=' . $recette['idUtilisateur'] . '" ><button type="button" id="suppIngredient" class="btn btn-outline-success" />Profil créateur</button></a>';
        if ($photo['photo'] == NULL) echo '<img class="card-img-top mb-5 mb-md-0" src="image/image_recette/plat.png" alt="photo de la recette">';

        else echo '<img class="card-img-top mb-5 mb-md-0" src="image/image_recette/' . $photo['photo'] . '" alt="photo de la recette">';
        echo '<p>date de publication : ' . $recette['datePublication'] . ', catégories : ';
        if (isset($categorie['nom'])) echo $categorie['nom'];
        if (isset($categorie['nomSousCategorie'])) echo ', ' . $categorie['nomSousCategorie'];

        echo '</p></div>
             <div class="col-md-6">
                 <h1 class="display-5 fw-bolder">' . htmlspecialchars($recette['titre']) . '</h1>
                 <p class="lead">temps de préparation estimé : ';
        if (floor((htmlspecialchars($recette['tpsPreparration']) / 60)) != 0) echo floor((htmlspecialchars($recette['tpsPreparration']) / 60)) . 'heure(s) et ';
        echo (htmlspecialchars($recette['tpsPreparration']) % 60) . ' minute(s)</p>
                 <hr class="my-4">
                 <div class="fs-5 mb-2">';

        echo '</div>
                 <h3>description : </h3>

                 <p class="lead" id="descriptionAffichage">' . htmlspecialchars($recette['description']) . '</p>';
        if ($recette['noteAnnexe'] != NULL)
        {
            echo '
                 <hr class="my-4"><h3>Annexe : </h3><p class="lead">' . htmlspecialchars($recette['noteAnnexe']) . '</p>';
        }
        echo '<hr class="my-4"><h3>Liste des ingrédients</h3>';
        foreach ($Ingredient as $value)
        {

            echo '<br> ' . htmlspecialchars($value['nomIngredient']) . ' : ' . htmlspecialchars($value['Quantite']) . ' ' . htmlspecialchars($value['unite']) . '';
        }
        echo '
                  <hr class="my-4">
                 <div class="d-flex">';
        if (isset($_SESSION['login']))
        {
            echo '<div id="divBoutonDeLike">
                      </div>';
        }
        echo '<div id="nbLike"></div>
                                    
                 </div>
                 
             </div>
         </div>
     </div>
     </section> 
                
      ';

        if (isset($_SESSION['login']))
        {
            echo '
         
        
         <section class="content-item" >
       <div class="container">   
          <div class="row">
               <div class="col-sm-8">   
                   <form id="formCommenterRecette" onsubmit="return false">
                      <h3 class="pull-left">Ajouter un commentaire</h3>
                      
                       <fieldset>
                           <div class="row">
                              
                               <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                 <textarea class="form-control" name="commentaire" id="exampleFormControlTextarea1" placeholder="Entrez votre commentaire " rows="3"></textarea>
                                   <button type="submit" class="w-10 btn btn-danger btn-lg" />Envoyer</button>
                               </div>
                              
                           </div>  	
                       </fieldset>
                   </form>
                   </section>
                   </>
         
         <h2 class="media"> les commentaire :</h2>   
         ';

        }
        echo '<section id="sectionCommentaireInserer">
      
      </section>';

        foreach ($commentaires as $value)
        {
            echo '
         
         
         <div id="commentaire' . $value['idCommentaire'] . '" class="media">
                 <a class="pull-left" href="#"><img id="pp" width="100" class="media-object" src="image/image_utilisateur/' . $value['photo'] . '" alt=""></a>
                 <div class="media-body">
                     <h4 class="media-heading">' .htmlspecialchars($value['login']). ' a écrit le ' . $value['dateAjout'] . ' a ' . $value['heureAjout'] . ' :';
            if (isset($_SESSION['login']) && $_SESSION['id'] == $value['idUtilisateur'])
            {
                echo '<button type="button" name="remove" id="' .htmlspecialchars($value['idCommentaire']). '"  class="btn btn-danger btn_remove">X</button>';
            }
            echo ' </p></h4>
                     <p>' . $value['commentaire'] . '</p>
          
                 </div>
             </div>
         
         
         ';

        }

    }

    public function afficher_form_Recette($tabIngr)
    {

        global $ListIngredient;
        echo '
            
            
            <form action="#" method="post" onsubmit="return false" id="formAjoutRecette">
            <div class="container">
            
            <div id="errorRecette"></div>
               <div id="validerAjout"></div>
            <div id="formulaireRecette">
            <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Ajouter une Recette</h4>
            <hr class="my-4">
         
            <div class="row g-3">
                  <div class="col-sm-6">
                     <label for="titre" class="form-label">Nom</label>
                     <input type="text" class="form-control" id="titre" name="titre" required>
                  </div>

               <div class=" col-12">
                  <label for="file" class="form-label">Photo de la recette<span class="text-muted">(Optional)</span></label>
                  <input class="form-control" name="file_photoRecette" type="file" id="id_file_photo_Recette">
               </div>

               <div class="col-md-3">
               <label for="heure" class="form-label">Heure</label>
               <select class="form-select" id="heure" name="heure" required>
                 <option value="0">Choose...</option>
                 ';
        for ($i = 0;$i < 10;$i++)
        {
            echo '<option>' . $i . '</option>';
        };
        echo '
               </select>
             </div>
 
             <div class="col-md-3">
               <label for="state" class="form-label">Minutes</label>
               <select class="form-select" id="state" name="min" required>
                 <option value="10">Choose...</option>
                 ';
        for ($i = 10;$i < 60;$i = $i + 10)
        {
            echo '<option>' . $i . '</option>';
        };
        echo '
               </select>
             </div>


             <div class="col-12 l-12">
               <label for="address2" class="form-label">Description<span class="text-muted"></span></label>
               <textarea class="form-control" name="description" id="exampleFormControlTextarea1" maxlength="1000" rows="3"></textarea>
            </div>

            <div class="col-12">
               <label for="email" class="form-label">Annexe <span class="text-muted">(Optional)</span></label>
               <input type="text" name="annexe" class="form-control" id="email" >
            </div>

            <div class="form-check form-switch">
               <input class="form-check-input" type="checkbox" name="vegan" role="switch" id="flexSwitchCheckDefault">
               <label class="form-check-label" for="flexSwitchCheckDefault">Vegan</label>
            </div>
               </div>
               <hr class="my-4">
               <div id=divIngredient1"> 
               
                  ingredient :<select name="ingredient1" id="ingredient1" form="formAjoutRecette">  ';
        foreach ($tabIngr as $value)
        {
            echo '  <option value="' . htmlspecialchars($value['idIngredient']) . ' ">' . htmlspecialchars($value['nomIngredient']) . '</option>';
        }
        echo ' </select>
               quantite : <input type="text" name="quantite1">   
               <select name="unite1" form="formAjoutRecette">   
                           <option value="kg">kg</option>
                           <option value="g">g</option>
                           <option value="mg">mg</option>
                           <option value="nb">nb</option>
                           <option value="l">l</option>
                           <option value="ml">ml</option>
               </select>

                  
                  </div>
               <div id="divContenantLesIngredient"> 
               </div>
               <hr class="my-4">
               
               <h6>Catégories : </h6>
               <div class="categories">
               <div id="lesCategories">     
               </div>
               <div id="lesSousCategories"> 
               </div></div>
               
               <hr class="my-4">
               <button type="button" id="ajtIngredient" targetId="divContenantLesIngredient" class="w-10 btn btn-success " value="ajouter ingr"/>ajt ingredient </button>
               <button type="button" id="suppIngredient" class="w-10 btn btn-danger " />supprimer ingredient </button>
               <hr class="my-4">
               <button class="w-100 btn btn-primary btn-lg" type="submit" id="boutonvaliderAJout">Ajouter la recette</button>
               </div></div></div>
               <input type="hidden" name="token" value='.$_SESSION['token'].' >
                  </form>
';

    }

    public function afficherFormModifRecette($recette, $tabIngr, $ListIngredient)
    {

        echo '
            
         <form action="#" method="post" onsubmit="return false" id="formModifRecette">
         <input type="hidden" name="token" value='.$_SESSION['token'].' >
         <div class="container">
         <div  id="errorRecette">
         </div>
         <div  id="validerAjout"></div>
         <div id="formulaireRecette">
         <div class="col-md-7 col-lg-8">
         <h4 class="mb-3">modifier la Recette : ' .htmlspecialchars($recette['titre']). '</h4>
         <hr class="my-4">
      
         <div class="row g-3">
               <div class="col-sm-6">
                  <label for="titre" class="form-label">Nom</label>
                  <input type="text" class="form-control" value="' .htmlspecialchars($recette['titre']). '"id="titre" name="titre" required>
               </div>

            <div class=" col-12">
               <label for="file" class="form-label">Photo de la recette<span class="text-muted">(Optional)</span></label>
               <input class="form-control" name="file_photoRecette" type="file" id="id_file_photo_Recette">
            </div>

            <div class="col-md-3">
            <label for="country" class="form-label">Heure</label>
            <select class="form-select" id="country" name="heure" required>
              <option value="0">Choose...</option>
              ';
        for ($i = 0;$i < 10;$i++)
        {
            echo '<option>' . $i . '</option>';
        };
        echo '
            </select>
          </div>

          <div class="col-md-3">
            <label for="state" class="form-label">Minutes</label>
            <select class="form-select" id="state" name="min" required>
              <option value="0">Choose...</option>
              ';
        for ($i = 10;$i < 60;$i = $i + 10)
        {
            echo '<option>' . $i . '</option>';
        };
        echo '
            </select>
          </div>


          <div class="col-12 l-12">
            <label for="address2" class="form-label">Description<span class="text-muted"></span></label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">' .htmlspecialchars($recette['description']). '</textarea>
         </div>

         <div class="col-12">
            <label for="email" class="form-label">Annexe <span class="text-muted">(Optional)</span></label>
            <input type="text" value="' .htmlspecialchars($recette['noteAnnexe']). '" name="annexe" class="form-control" id="email" >
         </div>';
        if ($recette['vegan'] == 1)
        {
            echo '
            <div class="form-check form-switch">
            <input class="form-check-input" checked="cheked" type="checkbox" name="vegan" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Vegan</label>
         </div>
            
            ';
        }
        else
        {

            echo '
            
            <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="vegan" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Vegan</label>
         </div>

            
            ';

        }
        echo '
        
            </div>
            <hr class="my-4">';
        foreach ($ListIngredient as $value)
        {
            echo '<p id="boutonSupp' . $value['idIngredient'] . '"> ' . htmlspecialchars($value['nomIngredient']) . ' ' . htmlspecialchars($value['Quantite']) . ' ' . htmlspecialchars($value['unite']) . ' <button type="button" name="remove" id="' . $value['idIngredient'] . '"  class="btn btn-danger btn_remove">X</button> </p>';

        }
        echo '        
            <div id=divIngredient1"> 
            


               ingredient :<select name="ingredient1" id="ingredient1" form="formModifRecette">  ';

        foreach ($tabIngr as $value)
        {
            echo '  <option value="' . htmlspecialchars($value['idIngredient']) . ' ">' . htmlspecialchars($value['nomIngredient']) . '</option>';
        }
        echo ' </select>
            quantite : <input type="text" name="quantite1">   
            <select name="unite1" form="formModifRecette">   
                        <option value="kg">kg</option>
                        <option value="g">g</option>
                        <option value="mg">mg</option>
                        <option value="nb">nb</option>
                        <option value="l">l</option>
                        <option value="ml">ml</option>
            </select>
               
               </div>
            <div id="divContenantLesIngredient"> 
            </div>
            <hr class="my-4">
            <div class="categories">
            <div id="lesCategories">     
            </div>
            <div id="lesSousCategories" float="right"> 
            </div
            </div>
            </div>
            <hr class="my-4">
            <button type="button" id="ajtIngredient" targetId="divContenantLesIngredient" class="w-10 btn btn-success btn-lg" value="ajouter ingr"/>ajt ingredient </button>
            <button type="button" id="suppIngredient" class="w-10 btn btn-danger btn-lg" />supprimer ingredient </button>
            <hr class="my-4">
            <a href="index.php?module=recette&action=afficherMaRecette&idRecette=' . $recette['idRecette'] . '"><button class="w-20 btn btn-secondary btn-lg" type="button">Annuler</button></a>
            <button class="w-50 btn btn-primary btn-lg" type="submit" id="boutonvaliderAJout">Modifier la recette</button>
            <button class="w-50 btn btn-primary btn-lg" type="submit" id="boutonvaliderAJoutNonClickable" disabled>Modifier la recette</button>
           </div>           
         </div>';
    }
}
?>
