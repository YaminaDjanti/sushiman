  //************** JQUERY pour page Home - Type livraison - Dropdown button */
  $(document).ready(function(){
  
  //Btn CV voir CV dans la page
   $("#cv-toggle").click(function(){
    $('.voirleCV').toggle('hide');  
  }) ;

   //Btn livraison
   $("#livraison-toggle").click(function(){
    $('.voirlivraison').toggle('hide');  
  }) ;
   //Btn Cà emporter
    $("#emporter-toggle").click(function(){
        $('.voiremporter').toggle('hide');  
    }) ;

    //Btn sur place
    $("#place-toggle").click(function(){
        $('.voirsurplace').toggle('hide');  
    }) ;

    //Quantity single product
    $("#add").click(function(){
      var newQty = +($("#qty").val()) + 1;
      if(!isNaN(newQty)){
        $("#qty").val(newQty);
      }else{
        newQty = 0;
      }
     
    });
    
    $("#minus").click(function(){
      var newQty = +($("#qty").val()) - 1;
      if(!isNaN(newQty) && newQty > 0){
        $("#qty").val(newQty);
      }else{
        newQty = 0;
      }
        
     
    });

    //Btn paiment affichage de la livraison
    $("#livraisonDisponible").click(function(){
      $('.livraisonDisponible').toggle('hide');  
  }) ;
    //Btn paiment à emporter hide affichage de la livraison
    $("#aEmporter").click(function(){
      $('.livraisonDisponible').hide("slow");  
  }) ;

    //select by catégorie anchor
    $(function () {
    if ( $( "[name='anchor']" ).length ) {
        window.location = '#' + $( "[name='anchor']" ).val();
    }
  });  

    
     

      //popup app.blade horaires
      $(".open").on("click", function(){
        $(".popup, .popup-content").addClass("active");
        });
      $(".close, .popup").on("click", function(){
        $(".popup, .popup-content").removeClass("active");
        });

});

 //************** JS pour Billing adress same as delivery adress*/

 //Billing adress same as delivery adress
 function SetBilling(checked){
  if (checked){
    document.getElementById('adressePostaleDelivery').value = document.getElementById('adressePostaleBilling').value;
    document.getElementById('codePostalDelivery').value = document.getElementById('codePostalBilling').value;
    document.getElementById('villeDelivery').value = document.getElementById('villeBilling').value;
  

  }
}

