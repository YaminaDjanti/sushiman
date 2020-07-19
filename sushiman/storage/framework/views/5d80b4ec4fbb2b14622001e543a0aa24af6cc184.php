<!DOCTYPE html>

<?php $__env->startSection('title'); ?>
    A propos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <?php
        $sliders=DB::table('sliders')
            ->where('status',1)
            ->first();

        
       
    ?>
		

<div class="hero-wrap hero-bread" style="background-image: url(storage/slider_images/<?php echo e($sliders->slider_image); ?>);">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        
        <h1 class="mb-0 bread">A propos de M.Sushi</h1>
      </div>
    </div>
  </div>
</div>


<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" 
      style="background-image: url(frontend/images/cover-3.jpg);">
        
      </div>
      <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
        <div class="heading-section-bold mb-4 mt-md-5">
          <div class="ml-md-0">
            <h2 class="mb-4">M.Sushi Votre restaurateur de spécialités japonaises.</h2>
          </div>
        </div>
        <div class="pb-md-5">
          <p class="text-right">
            Conscients de l'importance d'une nourriture saine et de qualité, M.Sushi s'engage au respect de votre exigence gustative et met à votre disposition l'Art et le savoir-faire de la tradition culinaire Japonaise.</p>
         <p class="text-right">   Les poissons utilisés dans la confection de nos sushis et bentos artisanaux sont rigoureusement sélectionnés et toujours frais.
            <br>Nous vous proposons les poissons en fonction des arrivages quotidiens et choisissons toujours la meilleure qualité, du thon frais, du saumon label rouge écossais et toujours plus de variété de poissons ou de recettes pour vous satisfaire 
             </p>
             <div class="text-right">
               <a href="<?php echo e(URL::to('/shop')); ?>" class="btn btn-primary">Découvrir notre carte</a>
               
               

             </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb py-5 ">
  <div class="container py-4">
    <div class="row d-flex justify-content-around py-5">
      <div class="col-md-6 d-flex align-items-center justify-content-around">
          <div class="form-group d-flex">
            <a href="https://g.page/r/CUOV42uOby9CEAI/review" class="btn-secondary py-3 px-4">Donnez votre avis</a>
          </div>
  
      </div>
      <div class="col-md-6">
        <h2 style="font-size: 22px;" class="mb-0">Votre avis est important!</h2>
        <span>M.Sushi vous régale ? Faites le savoir! </span><br>
        <span> Vos avis nous permettent d'être toujours au plus près de votre satisfaction.</span>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading text-center">Nos services</span>
                    <h2 class="mb-4">Votre confort pour nous c'est :</h2>
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading h2">Au restaurant ou à la maison. <br><span class="text-muted h4">En Livraison, sur place ou à emporter, vous choisissez</span></h2>
                <p class="h6 font-weight-light">Envie de déguster nos spécialités chez vous? Profitez de la vente à emporter, sans montant minimum.</p>
                <p class="h6 font-weight-light">Ou choisissez la livraison, gratuite à partir de 20 euros d'achat.</p>
              </div>
              <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="frontend/images/cover-4.jpg" alt="restaurant">
              </div>
            </div>
    
            <hr class="featurette-divider">
    
            <div class="row featurette">
              <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading h2">Des produits frais selectionnés <br> <span class="text-muted h4">Des produits locaux labelisés</span></h2>
                <p class="h6 font-weight-light">Les poissons utilisés dans la confection de nos sushis et bentos artisanaux sont rigoureusement sélectionnés et toujours frais</p>
              </div>
              <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="frontend/images/cover-5.jpg" alt="produits locaux">
              </div>
            </div>
    
            <hr class="featurette-divider">
    
            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading h2">Le savoir faire de la tradition culinaire japonaise<span class="text-muted h4"><br>Le choix de l'exigence gustative</span></h2>
                <p class="h6 font-weight-light">Notre carte vous laisse un large de choix de composition. M.Sushi s'engage au respect de votre exigence gustative et met à votre disposition l'Art et le savoir-faire de la tradition culinaire Japonaise. </p>
              </div>
              <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="frontend/images/cover-6.jpg" alt="tradition culinaire">
              </div>
            </div>
    
            <hr class="featurette-divider">
            
            
        </div>
    </div>
</section>




<section class="temoignages bg-light">
  <div class="container-fluid">
      <div class=" heading-section ftco-animate text-center">
          <span class="subheading">Témoignages | Avis Google</span>
          <h2 class="mb-4">Ce que pensent nos clients</h2>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
              <div class="carousel-text">
                  <div class="carousel-item active">
                      <div class="text text-center">
                              <p class="name">Bru Gui</p>
                              <div class="mb-2">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star "></i>
                              </div>
                          
                              <p class="mb-2 pl-4 line h-6 ">Large choix de sushi, maki, sashimi, california et autres spécialités.
                                  <span class="my-1"> Mais bon le meilleur plat reste, pour moi, le Chirachi Tartare <br>(Saumon, thon, Daurade et avocat avec une legère pointe de citron - coco).  </span><br>
                                  <span class="my-1"> Y a même pas photo. </span><br>
                                  <span class="my-1"> La qualité des produits et exceptionnelle (label rouge pour le saumon et le poulet) et issu de l'agriculture bio pour le riz.<br>
                                      Ingrédients de qualité = pièces de super qualité. </span><br>
                                  <span class="my-1"> Et en plus il fait la livraison. Je recommande et à comparer avec un sushi shop vous ne serez pas déçu pour des prix presque identiques...</span>
                                  </p>
                              
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="text text-center">
                              <p class="name">Caroline DECOSTER</p>
                              <div class="mb-2">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star "></i>
                              </div>
                              <p class="mb-2 pl-4 line h-5 ">Cela fait maintenant trois ans que nous sommes des inconditionnels de ce restaurant.<br>
                                  <span class="my-1"> Tous les produits sont de très bonne qualité (les poissons sont très frais), les délais de livraison sont toujours respectés, et toute l'équipe (y compris les livreurs) est très sympathique.</span><br>
                                  <span class="my-1">Mention spéciale pour les spring rolls crevette tempura qui sont un régal.</span>
                                  <span class="my-1">Bref, une excellente adresse que je recommande fortement : vous oublierez vite tous les SushiShop and Co !!</span></p> 
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="text text-center">
                              <p class="name">Laura Trevisiol</p>
                              <div class="mb-2">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star "></i>
                              </div>
                              <p class="mb-2 pl-4 line h-5">
                                  Trop bon ! Et pas chers du tout ! <br>
                                  Riz bio, label rouge <br>
                                  Qualité au rdv<br>
                                  Personnels gentils. <br> 
                                  30min de livraison environ. Cela peut varier et devenir long mais c'est assez rare. Dans ce cas choisir "à emporter" car très rapide. <br>
                                  Dommage qu'il n'y est pas de carte de fidélité. <br>
                                  Je recommande qualité et bas prix !</p>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="text text-center">
                              <p class="name">Florence Simon</p>
                              <div class="mb-2">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star "></i>
                              </div>
                              <p class="mb-2 pl-4 line h-5">J’adore !! Pour une 1ère commande avec livraison nous avons été ravis de déguster des produits frais de qualités. <br>
                                  Nous avons été livré à l’heure, les produits été bien présentés. <br>Nous recommandons vivement !!</p>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="text text-center">
                              <p class="name">Pinheiro Machado Mélanie</p>
                              <div class="mb-2">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star "></i>
                              </div>
                              <p class="mb-2 pl-4 line h-5">Excellent et généreux ! <br>
                              <span class="my-1"> Tous fais maison  </span> <br>
                              <span class="my-1">  Super accueil du personnel nous avons passé commande pour 15 personnes et servis à l’heure sans erreur dans la commande.</span><br> 
                              <span class="mt-2">On peux le classer dans le top 3 des japonais à tester sur Bordeaux</span>
                                  Nous reviendrons  </p> 
                          </div>
                  </div>
              </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <i class="fas fa-arrow-circle-left fa-3x"></i>
              <span class="sr-only">Précédent</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <i class="fas fa-arrow-circle-right fa-3x"></i>
              <span class="sr-only">Suivant</span>
          </a>
      </div>

      <div class="text-center my-4">
          <a href="https://www.google.com/search?sxsrf=ALeKk02vHEVkLuFAd1ycZbStG7Z6-CmYrA%3A1591176174629&source=hp&ei=7mvXXt7yI6aPlwTNyrfwDA&q=sushiman+lebouscat&oq=sushi&gs_lcp=CgZwc3ktYWIQAxgCMgQIIxAnMgQIIxAnMgQIIxAnMgIIADICCAAyAggAMgIIADICCAAyAggAMgIIADoFCAAQgwFQqAlYhA9gmx5oAHAAeACAAUOIAa4CkgEBNZgBAKABAaoBB2d3cy13aXo&sclient=psy-ab#lrd=0xd55286b448910b1:0xbd4f5ea5a6f2db5e,1,,," 
              class="btn btn-primary btn-outline-primary mb-3">Voir tous les avis</a>

      </div>         
  </div>
</section>

<section class="ftco-section">
  <div class="container">
      <div class="heading-section ftco-animate text-center">
          <span class="subheading text-center">Nos garanties</span>  
      </div>
      <div class="row no-gutters ftco-services">
         
       
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate ftco-services">
              <div class="media block-6 services mb-md-0 mb-4">
                  <div class="icons icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                      <i class="far fa-snowflake fa-3x i_garanties"></i>
                  </div>
                  <div class="media-body">
                      <h3 class="heading">Produits frais</h3>
                      <span>Produit frais garanti</span>
                  </div>
              </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services mb-md-0 mb-4">
                  <div class="icons icon bg-color-2 active d-flex justify-content-center align-items-center mb-2">
                      <i class="fas fa-carrot fa-3x i_garanties"></i>
                  </div>
                  <div class="media-body">
                      <h3 class="heading">Produits Bio</h3>
                  <span>Produit bio en France </span>
                  </div>
              </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate ftco-services">
              <div class="media block-6 services mb-md-0 mb-4">
                  <div class="icons icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                      <i class="fas fa-user-lock fa-3x i_garanties"></i>
                   </div>
                  <div class="media-body">
                      <h3 class="heading">Paiement </h3>
                      <span>Paiement en ligne sécurisé</span>
                  </div>
              </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate ftco-services">
              <div class="media block-6 services mb-md-0 mb-4">
                  <div class="icons icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                      <i class="fas fa-shipping-fast fa-3x i_garanties"></i>
                  </div>
                  <div class="media-body">
                      <h3 class="heading">Livraison</h3>
                      <span>En livraison, à emporter ou sur place</span>
                  </div>
              </div>      
          </div>
          
      </div>
  </div>
</section>



	<?php $__env->stopSection(); ?>


    
  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/client/about.blade.php ENDPATH**/ ?>