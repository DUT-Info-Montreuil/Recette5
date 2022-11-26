
<script>
$(document).ready(function(){  


  
    var i=1;  
   
    $(
        function(){


            $("#formcom").submit(
            function(){
           
                $.ajax({
                    method: "POST",
                    url:    "module/mod_recette/ajax/ajoutDeRecette.php",
                    data : $(this).serialize() + '&nbIngredient=' + i+ '&idutilisateur=' +<?php echo $_SESSION['id'] ?>,
                    dataType: "json"
                })
                .done(function(data){
                   
                    if(data==1)
                        $('#errorRecette').empty().append('pas de titre');
                    else if(data==2)
                        $('#errorRecette').empty().append('Veuillez mettre un temps de préparation valide');
                    else if(data==3)
                        $('#errorRecette').empty().append('Veuillez mettre une description');
                    else{
                        $('#validerAjout').empty().append('Votre recette a bien été ajoutée');
                       
                        $('#formcom').hide();
                    }
                   

                });

                    return false;
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
                i++;
         
                $('#divContenantLesIngredient').append('<div id="divIngredient'+i+'"> ingredient: <select name=ingredient'+i+' form="formcom"><?php echo $liste; ?></select>');
                $('#divIngredient'+i+'').append('quantite : <input type="text" name="quantite'+i+'" form="formcom"> <select form="formcom" name="unite'+i+'"><option value="kg">kg</option> <option value="g">g</option><option value="mg">mg</option><option value="nb">nb</option><option value="l">l</option><option value="ml">ml</option></select>');
                $('#divContenantLesIngredient').append(' </div>');
              
               
               
                
            }

            );
       
        }
    );

    $(
        function(){
            $("#suppIngredient").click(
                function(){
                    $('#divIngredient'+i+'').remove();  
                    i--;
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
            var i=1;  
    $(
        function(){
            $("#ajtIngredient").click(
            function(){
                i++;
                $('#tabIngredient').append('<tr id="row'+i+'">  <td><br><select name="cars1" id="cars" form="carform">  <option value="volvo">Volvo</option> <option value="saab">Saab</option> <option value="opel">Opel</option>  <option value="audi">Audi</option></select> </td>  </tr>');  
      
            }

        );
       
        }
    );

    $(
        function(){
            $("#suppIngredient").click(
                function(){
                    $('#row'+i+'').remove();  
                    i--;
                }

            );
        }
    );
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