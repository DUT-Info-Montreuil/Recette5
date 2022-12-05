
<script>



$(document).ready(function(){  

    var nbingredient=1;  
    $('#boutonvaliderAJout').hide();
    $("#formAjoutRecette").bind("keypress", function (e) {
    if (e.keyCode == 13) {
        $("#btnSearch").attr('value');
        
        return false;
    }
    });





//----------------------------------Ajout de Recette-------------------------------/
        document.getElementById("formAjoutRecette").onchange = function() {
               
               var myForm = document.getElementById('formAjoutRecette');
               let form=new FormData(myForm);
               form.append('nbingredient',nbingredient);
               
                      $.ajax({
                       type: "POST",
                       url: "module/mod_recette/ajax/ajoutRecette/verifierFormRecette.php",
                       data: form,
                       contentType: false,
                       cache: false,
                       processData: false,
                       dataType: "json",
                       success: function (data) {
                      
                        if(data=="bon"){
                            $('#boutonvaliderAJout').show();
                            $('#errorRecette').empty();
                        }

                        else{
                            $('#boutonvaliderAJout').hide();
                            $('#errorRecette').empty().append(data);
                        }
                           
                        
                    }
                   })
                  
               };

               


  
               

    $(
        function(){


            $("#formAjoutRecette").submit(
            function(){
               
                $('#validerAjout').empty();
                $('#errorRecette').empty();


                let form=new FormData(this);
                form.append('nbingredient',nbingredient);
               $.ajax({
                type: "POST",
                url: "module/mod_recette/ajax/ajoutRecette/ajoutDeRecette.php",
                data: form,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    if(data==5){
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Token invalide ou expiré',
                        
                      })
                      setTimeout(
                        function() 
                        {
                           window.location.href = 'index.php?index.php?module=connexion&action=bienvenue';
                        }, 1000);
                    
                    }else{
                        $('#validerAjout').empty().append("recette ajoutée");
                        $("#formulaireRecette").hide();
                        Swal.fire('recette ajoutée')  
                     setTimeout(
                        function() 
                        {
                        window.location.href = 'index.php?module=recette&action=afficherMesRecettes';
                        }, 1000);
                    }
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
         
                $('#divContenantLesIngredient').append('<div id="divIngredient'+nbingredient+'"> ingredient :<select name=ingredient'+nbingredient+' form="formAjoutRecette"><?php echo $liste; ?></select>');
                $('#divIngredient'+nbingredient+'').append(' quantite : <input type="text" name="quantite'+nbingredient+'" form="formAjoutRecette"> <select form="formAjoutRecette" name="unite'+nbingredient+'"><option value="kg">kg</option> <option value="g">g</option><option value="mg">mg</option><option value="nb">nb</option><option value="l">l</option><option value="ml">ml</option></select>');
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
