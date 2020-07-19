<div class="pb-1 padding-top-header bg-primary">
  <div class="container">
      <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
          <div class="col-lg-12 d-block">
              <div class="row d-flex">
                  <div class="col-md pr-4 d-flex topper align-items-center">
                      <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                      <a href="tel:0556291152"><span class="text">05 56 29 11 52</span></a>
                  </div>
                  <div class="col-md pr-4 d-flex topper align-items-center">
                    <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                    <span class="text">Lundi au samedi 10h15->14h00</span>
                    <span class="text">Tous les soirs 18h00->22h00</span>
                </div>
                  
                  <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                      
                      <a href="<?php echo e(URL::to('/#services')); ?>"><span class="text">Livraison | Emporter | Sur place au Bouscat</span>
                          </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
  <a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>">M.Sushi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
  </button>

  <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item active"><a href="<?php echo e(URL::to('/')); ?>" class="nav-link">Accueil</a></li>
      <li class="nav-item active"><a href="<?php echo e(URL::to('/shop')); ?>" class="nav-link">La Carte</a></li>
      <li class="nav-item active"><a href="<?php echo e(URL::to('/about')); ?>" class="nav-link">A propos</a></li>
      <li class="nav-item active"><a href="<?php echo e(URL::to('/contact')); ?>" class="nav-link">Contact</a></li>
      
      <li class="nav-item cta cta-colored"><a href="<?php echo e(URL::to('/panier')); ?>" class="nav-link">Panier<span class="icon-shopping_cart"></span>[<?php echo e(Session::has('panier')?count(Session::get('panier')->items):0); ?>]</a></li>

      </ul>
  </div>
  </div>
</nav>
<!-- END nav --><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/partials/header.blade.php ENDPATH**/ ?>