<!DOCTYPE html>
<html lang="fr">
  <head>
    <title><?php echo $__env->yieldContent('title'); ?> | M.Sushi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

 
    <!-- Carousel -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.theme.default.min.css')); ?>">

    <!-- zoom + effects css -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.css')); ?>">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <!-- Icon -->
    <link href="<?php echo e(asset('frontend/fonts/all.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/open-iconic-bootstrap.min.css')); ?>">
   
    
    <!-- Custom style -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
 

  
  </head>
  <body class="goto-here">
    <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   

    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
  

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                          <a href="#" class="mouse-icon">
                              <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                          </a>
                      </div>
            </div>
          <div class="row mb-5">
            <div class="col-md">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">M. Sushi</h2>
                <p>Restaurateur de sécialités culinaires japonaises au Bouscat. Sur place | à emporter | en livraison.</p>
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <div class="d-block">
                  <span class="text">Lundi au samedi 10h15->14h00</span>
                  <span class="text">Tous les soirs 18h00->22h00</span>
                </div>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                  
                  <li class="ftco-animate"><a href="https://www.facebook.com/Sushiman-100796334957383/"><span class="icon-facebook"><i class="fab fa-facebook"></i></span></a></li>
            
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Menu</h2>
                <ul class="list-unstyled">
                  <li><a href="<?php echo e(URL::to('/shop')); ?>" class="py-2 d-block">La Carte</a></li>
                  <li><a href="<?php echo e(URL::to('/about')); ?>" class="py-2 d-block">&Agrave; propos</a></li>
                  <li><a href="<?php echo e(URL::to('/contact')); ?>" class="py-2 d-block">Nous contacter</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
               <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Informations</h2>
                <div class="d-flex">
                    <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                      <li><a href="<?php echo e(URL::to('/mentions')); ?>" class="py-2 d-block">Mentions légales</a></li>
                      <li><a href="<?php echo e(URL::to('/conditions')); ?>" class="py-2 d-block">Conditions de vente</a></li>
                    </ul>
                  </div>
              </div>
            </div>
           
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
  
              <p>
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> création Yamina Djanti    
 </p>
            </div>
          </div>
        </div>
      </footer>

      
       <!-- loader -->
       <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#FF3F51"/></svg></div>
   
  <!-- Jquery/Boostrap general-->
    <script src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/jquery.stellar.min.js')); ?>"></script>

    <!--number styling-->
    <script src="<?php echo e(asset('frontend/js/boostrap-input-spinner.js')); ?>"></script>
    <!-- Carousel slider-->
    <script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
    <!-- zoom + effects loader -->
    <script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/scrollax.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/jquery.animateNumber.min.js')); ?>"></script>
    <!-- Google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="<?php echo e(asset('frontend/js/google-map.js')); ?>"></script>
    <!-- Custom JS-->
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/script.js')); ?>"></script>
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/d70b24b0b8.js" crossorigin="anonymous"></script>
   <script type="text/javascript">
      jQuery("#addto_cart").click(function(){
        var qty=jQuery("#qty").val();
        var productid=jQuery("#product_id").val();
        var APP_URL = <?php echo json_encode(url('/')); ?>

        var productCategorie = $('#product_categorie').val(); 
        var accompagnement1Id = $('#accompagnement1').val();
        var accompagnement2Id = $('#accompagnement2').val();

        if(productCategorie === "Formules du midi"){

        var accompagnement1 = $('#accompagnement1').val();
          jQuery(location).attr('href', APP_URL+'/ajouter_au_panierMultipleProducts/'+productid+'/'+qty+'?'+'accompagnement1='+accompagnement1Id+'&accompagnement2='+accompagnement2Id);

        }else{

          jQuery(location).attr('href', APP_URL+'/ajouter_au_panierSingleProduct/'+productid+'/'+qty);
        }
       

      });
  </script>    
    
    <?php echo $__env->yieldContent('scripts'); ?>
    </body>
  </html><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/layouts/app.blade.php ENDPATH**/ ?>