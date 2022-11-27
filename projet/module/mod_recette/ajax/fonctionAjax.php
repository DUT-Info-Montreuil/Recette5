
<script>
$(document).ready(function(){  
    var nbingredient=1;  
    $('#boutonvaliderAJout').hide();
    $("#formcom").bind("keypress", function (e) {
    if (e.keyCode == 13) {
        $("#btnSearch").attr('value');
        
        return false;
    }
});



        document.getElementById("formcom").onchange = function() {
               
               var myForm = document.getElementById('formcom');
               let form=new FormData(myForm);
               form.append('nbingredient',nbingredient);
                      $.ajax({
                       type: "POST",
                       url: "module/mod_recette/ajax/verifierFormRecette.php",
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


            $("#formcom").submit(
            function(){
               
                $('#validerAjout').empty();
                $('#errorRecette').empty();


                let form=new FormData(this);
                form.append('nbingredient',nbingredient);
               $.ajax({
                type: "POST",
                url: "module/mod_recette/ajax/ajoutDeRecette.php",
                data: form,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    $('#validerAjout').empty().append("recette ajoutée");
                    $("#formulaireRecette").hide();
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
         
                $('#divContenantLesIngredient').append('<div id="divIngredient'+nbingredient+'"> ingredient: <select name=ingredient'+nbingredient+' form="formcom"><?php echo $liste; ?></select>');
                $('#divIngredient'+nbingredient+'').append('quantite : <input type="text" name="quantite'+nbingredient+'" form="formcom"> <select form="formcom" name="unite'+nbingredient+'"><option value="kg">kg</option> <option value="g">g</option><option value="mg">mg</option><option value="nb">nb</option><option value="l">l</option><option value="ml">ml</option></select>');
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

<script > 
         setInterval('load_nblikes()',500);
        
         function load_nblikes(){
            
            $.post("module/mod_recette/ajax/Nblike.php",{idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                $('#nbLike').empty().append(data);
                });

           
            
         }

         $(document).ready(function(){
           
            $('#divBoutonDeLike').append('<button  id="boutonDeDisLike"><img src="image/dislike.png" height ="80" width="100" /></button>   ');
            $('#divBoutonDeLike').append('<button  id="boutonDeLike"><img src="image/like.png" height ="80" width="100" /></button>');
            $("#boutonDeLike").hide();
            $("#boutonDeDisLike").hide();
            $.post("module/mod_recette/ajax/Nblike.php",{idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                $('#nbLike').empty().append(data);
                });
            $.post("module/mod_recette/ajax/verfierSiLaRecetteEstLiker.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                   if(data==1)
                   $("#boutonDeDisLike").show();
                   else{
                    $("#boutonDeLike").show();
                   }
                });
});
       
         $(
        function(){
            $("#boutonDeLike").click(
            function(){
                
                $.post("module/mod_recette/ajax/likerLaRecette.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                    $("#boutonDeLike").hide();
                    $("#boutonDeDisLike").show();
                });
            }

        );
        }
    );
    $(
        function(){
            $("#boutonDeDisLike").click(
            function(){

                $.post("module/mod_recette/ajax/dislikerLaRecette.php",{idUtilisateur:<?php echo $_SESSION['id'] ?>,idRecette:<?php echo$_GET['idRecette']?>},function(data){  
                    $("#boutonDeDisLike").hide();
                    $("#boutonDeLike").show();
                });
                
            }

        );
        }
    );


   </script>