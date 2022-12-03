
<script>



$(document).ready(function(){  

    
        $(document).on('click', '#BoutonSupprimerRecette', function(){  
            var idRecette = $(this).attr("value");   
            Swal.fire({
                title: "Voulez-vous vraiment supprimer la recette numéro "+idRecette+" ?",
                showDenyButton: true,
                showCancelButton: false,
                
                confirmButtonText: 'oui',
                denyButtonText: `non`,
                }).then((result) => {
                   
                    if (result.isConfirmed) {
                     
                        $.post("module/mod_admin/ajax/recette/supprimerRecette.php",{idRecette:idRecette},function(data){  
                                             
                                                Notif.fire({
                                                    icon: 'success',
                                                    title: 'recette supprimer'
                                                })
                                                $('#recette'+idRecette+'').hide();
                         });
                      
                    }
                })              
        }); 


            $("#chercherRecette").keyup(
                function(){
                    var mot =document.getElementById("chercherRecette").value

                    if(mot==""||mot==null){
                        $.post("module/mod_admin/ajax/recette/chercherTouteRecette.php",{mot:mot},function(data){  
                        $('#divRecette').empty();
                            $(data).each(function(i, recette){
                                $('#divRecette').append('<br>');
                                $('#divRecette').append('<div class="recetteAdmin" id="recette'+recette.idRecette+'">  <img src="image/image_recette/'+recette.photo+'"  width="20%" ><p>titre : '+recette.titre+'<p/><p>temps dePreparation : '+recette.tpsPreparration+'<p/><p>date de Publication : '+recette.datePublication+'<p/><p>note annexe : '+recette.noteAnnexe+'<p/><p> vegan : '+recette.vegan+'</p><p> createur :<a href="index.php?module=admin&action=afficherUtilisateur&idUtilisateur='+recette.idUtilisateur+'">'+recette.idUtilisateur+'</a></p><button type="button"  id="BoutonSupprimerRecette" value="'+recette.idRecette+'" class="btn btn-danger btn_remove">supprimer Recette</button>       ');
               });           
                                  
                      });
                    }else{
                        $.post("module/mod_admin/ajax/recette/chercherRecette.php",{mot:mot},function(data){  
                        $('#divRecette').empty();
                            $(data).each(function(i, recette){
                             
                                $('#divRecette').append('<br>');
                                $('#divRecette').append('<div class="recetteAdmin" id="recette'+recette.idRecette+'">  <img src="image/image_recette/'+recette.photo+'"  width="20%" ><p>titre : '+recette.titre+'<p/><p>temps dePreparation : '+recette.tpsPreparration+'<p/><p>date de Publication : '+recette.datePublication+'<p/><p>note annexe : '+recette.noteAnnexe+'<p/><p> vegan : '+recette.vegan+'</p><p> createur :<a href="index.php?module=admin&action=afficherUtilisateur&idUtilisateur='+recette.idUtilisateur+'">'+recette.idUtilisateur+'</a></p><button type="button"  id="BoutonSupprimerRecette" value="'+recette.idRecette+'" class="btn btn-danger btn_remove">supprimer Recette</button>       ');
                        
                            });           
                                  
                      });
                    }
                   
               
            }
        );
        
      

     });


 
     </script>
