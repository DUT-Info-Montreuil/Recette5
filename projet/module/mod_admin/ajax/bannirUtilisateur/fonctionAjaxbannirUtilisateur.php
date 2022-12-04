
<script>



$(document).ready(function(){  
   
    
        $(document).on('click', '#boutonBanUtilisateurs', function(){  
            var idUtilisateur = $(this).attr("value");   
            Swal.fire({
                title: "Voulez-vous vraiment bannir l'utilisateur "+idUtilisateur+" ?",
                showDenyButton: true,
                showCancelButton: false,
                
                confirmButtonText: 'oui',
                denyButtonText: `non`,
                }).then((result) => {
                   
                    if (result.isConfirmed) {
                     
                        $.post("module/mod_admin/ajax/bannirUtilisateur/bannir.php",{idUtilisateur:idUtilisateur},function(data){  
                                             
                                                Notif.fire({
                                                    icon: 'success',
                                                    title: 'utilisateur banni'
                                                })
                                                $('#LesBoutonBan'+idUtilisateur+'').empty().append(' <td><button class="btn btn-success" type="button" id="boutonDeBanUtilisateurs" value="'+idUtilisateur+'">deban utilisateur</button></td>');
                                                if(location.search=='?module=admin&action=afficherUtilisateur&idUtilisateur='+idUtilisateur+''){
                                                        location.reload();
                                                    }
                                        });
                      
                    }
                })
        }); 


        

        $(document).on('click', '#boutonDeBanUtilisateurs', function(){  
               
            var idUtilisateur = $(this).attr("value");   
            Swal.fire({
                title: "Voulez-vous vraiment Débannir l'utilisateur "+idUtilisateur+" ?",
                showDenyButton: true,
                showCancelButton: false,
                
                confirmButtonText: 'oui',
                denyButtonText: `non`,
                }).then((result) => {
                   
                    if (result.isConfirmed) {
                     
                        $.post("module/mod_admin/ajax/bannirUtilisateur/deBannir.php",{idUtilisateur:idUtilisateur},function(data){  
                                             
                                                Notif.fire({
                                                    icon: 'success',
                                                    title: 'utilisateur Debanni'
                                                })
                                             
                                                $('#LesBoutonBan'+idUtilisateur+'').empty().append(' <td><button class="btn btn-danger" type="button" id="boutonBanUtilisateurs" value="'+idUtilisateur+'">bannir utilisateur</button></td>');
                                                    if(location.search=='?module=admin&action=afficherUtilisateur&idUtilisateur='+idUtilisateur+''){
                                                        location.reload();
                                                    }
                                            });
                      
                    }
                })
        }); 



        
 });


 
     </script>
