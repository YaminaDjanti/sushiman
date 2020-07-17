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

    //single product - augmenter quantité
      // Jquery("#addto_cart").click(function(){
      //   var qty=jQuery("#qty").val();
      //   var productid=jQuery("#product_id").val();
      //   var APP_URL = json_encode(url('/')) 
      //   jQuery(location).attr('href', APP_URL+'/ajouter_au_panierSingleProduct/'+productid+'/'+qty);
        

      // });

      //popup app.blade horaires
      $(".open").on("click", function(){
        $(".popup, .popup-content").addClass("active");
        });
      $(".close, .popup").on("click", function(){
        $(".popup, .popup-content").removeClass("active");
        });

});

