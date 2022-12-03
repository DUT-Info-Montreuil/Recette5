
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
                     
                        $.post("module/mod_admin/ajax/commentaire/supprimerCom.php",{idCommentaire:idCom},function(data){  
                                             
                                                Notif.fire({
                                                    icon: 'success',
                                                    title: 'commentaire supprimer'
                                                })
                                                $('#commentaire'+idCom+'').hide();
                         });
                      
                    }
                })
                        



        }); 


        

      
 });


 
     </script>
