
<script > 

$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
        
           Swal.fire({
                title: 'Voulez-vous vraiment supprimer votre commentaire ?',
                showDenyButton: true,
                showCancelButton: false,
                
                confirmButtonText: 'oui',
                denyButtonText: `non`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                     
                        $.post("module/mod_recette/ajax/commenterRecette/supprimerCommentaireDeLaRecette.php",{idCommentaire:button_id},function(data){  
                                                $('#commentaire'+button_id+'').hide();
                                                Notif.fire({
                                                    icon: 'success',
                                                    title: 'Commentaire supprimer'
                                                })
                         });
                      
                    } else if (result.isDenied) {
                        Swal.fire('modification annuler', '', 'info')
                    }
                })

                   



});  

 $(document).ready(function(){
    


            $(
        function(){
                $("#formCommenterRecette").submit(
                function(){
                    
                        let form=new FormData(this);
                        form.append('idRecette',<?php echo $_GET['idRecette'] ?>)
                    $.ajax({
                        type: "POST",
                        url: "module/mod_recette/ajax/commenterRecette/commenterLaRecette.php",
                        data: form,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            if(data!="vide"){
                                Notif.fire({
                                    icon: 'success',
                                    title: 'Commentaire Ajouter'
                                })
                                $('#sectionCommentaireInserer').append('<div id="commentaire'+data.idCommentaire+'" class="media"> <a class="pull-left" href="#"><img  id="pp" width="100" class="media-object" src="image/image_utilisateur/'+data.photo+'" alt=""></a> <div class="media-body"><h4 class="media-heading"> '+data.login+' a écrit le '+data.dateAjout+' a '+data.heureAjout+' : <button type="button" name="remove" id="'+data.idCommentaire+'"  class="btn btn-danger btn_remove">X</button> </p></h4><p>'+data.commentaire+'</p></div></div>'); 
                                
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Veuillez saisir un commentaire',
                    
                                 })
                        }
                    }
                    })
                }
            );
        }
      
    );
});


   </script>