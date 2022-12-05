
<script>



$(document).ready(function(){  

        $(document).on('click', '#boutonSupprimerUtilisateur', function(){  
               
            var idUtilisateur = $(this).attr("value");   
            Swal.fire({
                title: "Voulez-vous vraiment supprimer le compte de  l'utilisateur "+idUtilisateur+" ?",
                showDenyButton: true,
                showCancelButton: false,
                
                confirmButtonText: 'oui',
                denyButtonText: `non`,
                }).then((result) => {
                   
                    if (result.isConfirmed) {
                     
                        $.post("module/mod_admin/ajax/supprimerUtilisateur/supprimerUtilisateur.php",{idUtilisateur:idUtilisateur},function(data){  
                            if(data==5){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Vous n\'êtes pas autoriser a supprimer un Utilisateur',
                                    
                                })

                            }else{
                                Swal.fire('utilisateur supprimer')  
                                setTimeout(
                                    function() 
                                    {
                                    window.location.href = 'index.php?module=admin&action=gererUtilisateur';
                                    }, 1000);
                            }
                        });
                      
                    }
                })
        }); 
      
                      

        
 });


 
     </script>
