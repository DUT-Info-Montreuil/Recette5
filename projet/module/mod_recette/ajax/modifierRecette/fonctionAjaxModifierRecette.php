
<script>

$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
            var nbingredient=1;


           Swal.fire({
                title: 'Voulez-vous vraiment supprimer cet ingrédient ?',
                showDenyButton: true,
                showCancelButton: false,
                
                confirmButtonText: 'oui',
                denyButtonText: `non`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        idRecette=<?php echo $_GET['idRecette'] ?>;
                        $.post("module/mod_recette/ajax/modifierRecette/supprimerIngredientDeLaRecette.php",{idIngredient:button_id,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                                                $('#boutonSupp'+button_id+'').hide();
                                      
                         });
                       
                    } else if (result.isDenied) {
                        Swal.fire('modification annuler', '', 'info')
                    }
                })

                   



});  


$(document).ready(function(){  

    const Toast = Swal.mixin({
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
        console.log("ezeeze");
        var nbingredient=1;  
        $('#boutonvaliderAJout').hide();
        $('#boutonvaliderAJoutNonClickable').show();
        $("#formAjoutRecette").bind("keypress", function (e) {
            if (e.keyCode == 13) {
                $("#btnSearch").attr('value');
                
                return false;
            }
        });





    //----------------------------------Modif de Recette-------------------------------/
    document.getElementById("formModifRecette").onchange = function() {
                console.log("modif");
       
                
                var myForm = document.getElementById('formModifRecette');
                let form=new FormData(myForm);
                form.append('nbingredient',nbingredient);
                
                        $.ajax({
                        type: "POST",
                        url: "module/mod_recette/ajax/modifierRecette/verifierFormRecette.php",
                        data: form,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                        
                            if(data=="bon"){
                                $('#boutonvaliderAJout').show();
                                $('#boutonvaliderAJoutNonClickable').hide();
                                $('#errorRecette').empty();
                            }

                            else{
                                $('#boutonvaliderAJout').hide();
                                $('#boutonvaliderAJoutNonClickable').show();
                                $('#errorRecette').empty().append(data);
                            }
                            
                            
                        }
                    })
                    
                };

                $(
        function(){


            $("#formModifRecette").submit(
            function(){
               
                $('#validerAjout').empty();
                $('#errorRecette').empty();
                var idRecette=<?php echo $_GET['idRecette'] ?>;
                Swal.fire({
                title: 'Voulez vous vraiment modifier cette recette ?',
                showDenyButton: true,
                showCancelButton: false,
                
                confirmButtonText: 'oui',
                denyButtonText: `non`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form=new FormData(this);
                        form.append('nbingredient',nbingredient);
                        form.append('idRecette',idRecette);
                        
                        $.ajax({
                            type: "POST",
                            url: "module/mod_recette/ajax/modifierRecette/modifierLaRecette.php",
                            data: form,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: "json",
                            success: function (data) {
                             
                                Swal.fire({
                                  
                                        title: 'Vos modification on été sauvegarder',
                                        confirmButtonText: 'OK',
                                        
                                        }).then((result) => {
                                            
                                            if (result.isConfirmed) {
                                             window.location.href = 'index.php?module=recette&action=afficherMaRecette&idRecette='+idRecette+'';
                                            } 
                                        })                       
                              
                                
                            }
                        })
                        
                    } else if (result.isDenied) {
                        Swal.fire('modification annuler', '', 'info')
                    }
                })
          
            }

        );
        }
      
    );




<?php 
    global $ListIngredient;
    $liste="";
    foreach( $ListIngredient as $value ){
        $liste =$liste.'<option value="'.htmlspecialchars($value['idIngredient']).' ">'.htmlspecialchars($value['nomIngredient']).'</option>';
}; 
    ?>

    $(
        function(){
            $("#ajtIngredient").click(
            function(){
                nbingredient++;
         
                $('#divContenantLesIngredient').append('<div id="divIngredient'+nbingredient+'"> ingredient :<select name=ingredient'+nbingredient+' form="formModifRecette"><?php echo $liste; ?></select>');
                $('#divIngredient'+nbingredient+'').append(' quantite : <input type="text" name="quantite'+nbingredient+'" form="formModifRecette"> <select form="formModifRecette" name="unite'+nbingredient+'"><option value="kg">kg</option> <option value="g">g</option><option value="mg">mg</option><option value="nb">nb</option><option value="l">l</option><option value="ml">ml</option></select>');
                $('#divContenantLesIngredient').append(' </div>');
              
               
               
                
            }

            );
       
        }
    );

    $(
        function(){
            $("#suppIngredient").click(
                function(){
                    $('#divIngredient'+nbingredient+'').remove();  
                    nbingredient--;
                }

            );
        }
    );




              


    
});
 
     </script>
