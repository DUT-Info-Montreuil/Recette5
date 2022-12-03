
<script>



$(document).ready(function(){  

    
        $(document).on('click', '#BoutonSupprimerCommentaire', function(){  
            var idCom = $(this).attr("value");   
            Swal.fire({
                title: "Voulez-vous vraiment supprimer le commentaire numéro "+idCom+" ?",
                showDenyButton: true,
                showCancelButton: false,
                
                confirmButtonText: 'oui',
                denyButtonText: `non`,
                }).then((result) => {
                   
                    if (result.isConfirmed) {
                     
                        $.post("module//ajax/commentaire/supprimerCom.php",{idCommentaire:idCom},function(data){  
                                             
                                                Notif.fire({
                                                    icon: 'success',
                                                    title: 'commentaire supprimer'
                                                })
                                                $('#commentaire'+idCom+'').hide();
                         });
                      
                    }
                })              
        }); 


            $("#chercherCom").keyup(
                function(){
                    var mot =document.getElementById("chercherCom").value
                    $.post("module/mod_admin/ajax/commentaire/chercherMotDansCom.php",{mot:mot},function(data){  
                        $('#divCommentaire').empty();
                            $(data).each(function(i, commentaire){
                                $('#divCommentaire').append('<br>');
                                $('#divCommentaire').append('<div id="commentaire'+commentaire.idCommentaire+'" class="media"><a class="pull-left" href="#"><img id="pp" width="100" class="media-object" src="image/image_utilisateur/'+commentaire.photo+'" alt=""></a> <div class="media-body"><h4 class="media-heading">'+commentaire.login+' a écrit le '+commentaire.dateAjout+' a '+commentaire.heureAjout+' :<button type="button"  id="BoutonSupprimerCommentaire" value="'+commentaire.idCommentaire+'" class="btn btn-danger btn_remove">supprimer commentaire</button> </p></h4>id commentaire :'+commentaire.idCommentaire+'<p>texte :'+commentaire.commentaire+'</p></div></div>');
                        });           
                                  
                      });
               
            }
        );
        
      

     });


 
     </script>
