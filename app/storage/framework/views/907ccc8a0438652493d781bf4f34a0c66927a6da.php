
<?php $__env->startSection('title'); ?>
    
    



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $sliders=DB::table('sliders')
                ->where('status',1)
                ->first();

        $produitsPlateaux=DB::table('produits')
                ->where('categorie','plateaux')
                ->where('status',1)
                ->get();
        $accompagnements=DB::table('produits')
                ->where('categorie','accompagnements')
                ->get();

        $publicImageStorage='http://localhost/sushiman/sushiman/public/storage' 
    ?>
    
	<div class="hero-wrap hero-bread" style="background-image: url('<?php echo e($publicImageStorage); ?>/slider_images/<?php echo e($sliders->slider_image); ?>');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-0 bread"><?php echo e($produit->nom_produit); ?></h1>
            </div>
          </div>
        </div>
    </div>
    <?php 
	    $message = Session::get('message');
	?>

		<?php if($message): ?>    
		<p class="alert alert-success mb-0">
			<?php
				echo $message;
                Session::put('message',null);
                
			?>
		</p>
		<?php endif; ?>
    <section class="ftco-section mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate text-center">
                    <a href="" class="image-popup mb-2"><img src="<?php echo e($publicImageStorage); ?>/cover_images/<?php echo e($produit->product_image); ?>" class="img-fluid" alt="<?php echo e($produit->product_image); ?>"></a>
                    <div class="pt-2">
                        <?php if($produit->description_produit !== ' '): ?>
                            <h4 class="mt-2 text-left">Composition :</h4>
                            <p class="subPrice">
                                <span><?php echo e($produit->description_produit); ?> </span></p>

                        <?php endif; ?>    
                    </div>
                    <div>
                        <?php if($produit->allergenes !== ' '): ?>
                            <p class="subPrice text-left">
                                <span class="mt-2 text-left h5">Information complémentaire : </span>
                                <span><?php echo e($produit->allergenes); ?> </span></p>
                        <?php endif; ?> 
                    </div>
                    <div class="text-left pt-2">
                        <?php if($produit->categorie === 'Formules du midi'): ?>
                      
                        <h4 class="mt-2 text-left">Premier accompagnement de votre formule :</h4>
                         <select  class=" subPrice" name="accompagnement1" style="color: gray;">
                            <option class="subPrice" style="color: gray;" >Sélectionnez un 1er accompagnement</option>
                                <?php $__currentLoopData = $accompagnements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accompagnement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="subPrice" style="color: gray;"><?php echo e($accompagnement->nom_produit); ?> </option>
                                    <option class="" type="hidden" style="color: gray;"  id="accompagnement1"><?php echo e($accompagnement); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </select>  
                        <?php endif; ?> 
                        <?php if($produit->categorie === 'Formules du midi'): ?>
                
                        <h4 class="mt-2 text-left pt-2">Deuxième accompagnement de votre formule :</h4>
                         <select class=" subPrice" name="accompagnement2" style="color: gray;">
                            <option class="subPrice" style="color: gray;">Sélectionnez un 2nd accompagnement</option>
                                <?php $__currentLoopData = $accompagnements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accompagnement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="" style="color: gray;"><?php echo e($accompagnement->nom_produit); ?> </option>
                                    <option class="subPrice " type="hidden" style="color: gray;" id="accompagnement2" ><?php echo e($accompagnement); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </select>  
                        <?php endif; ?> 
                    </div>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3 class="text-center"><?php echo e($produit->nom_produit); ?></h3>
                    
                    <div>
                        <p class="Price">
                            <span id="prixUnitaire">Prix unitaire TTC : <?php echo e($produit->prix); ?> € </span></p>
                    </div>

                        <div class="row mt-4">
                            <div class="w-100"></div>
                            <div class="d-flex align-items-center">
                                <div class="input-group col-md-6 d-flex mb-3">

                                    

                                     <span class="input-group-btn mr-2">
                                        <input type="submit" value="-" id="minus" class="quantity-left-minus btn" data-type="minus">
                                    </span>
                                    <input type="text" id="qty" name="quantity" class="form-control input-number" value="1" min="1" max="10">
                                    <span class="input-group-btn ml-2">
                                        <input type="submit" value="+" id="add" class="quantity-right-plus btn"> 
                                    </span>      
                                </div>
                                
                            </div>
                            <input type="hidden" name="product_id" id="product_id" value="<?php echo e($produit->id); ?>">
                            <input type="hidden" name="produit" id="produit" value="<?php echo e($produit); ?>">

                           
                            <div class="w-100"></div>
                        </div>
                    <p class="pt-2"><a  class="btn btn-black py-3 px-5 text-white" id="addto_cart">Ajouter au panier</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class=" mt-3">
        <div class="container">
                <div class="row justify-content-center mb-3 pb-3">          
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Produits assortis</span>
            <h2 class="mb-4"><?php echo e($produit->nom_produit); ?> s'accompagne bien avec :</h2>
        </div>
        </div>   		
        </div>
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $produitsPlateaux; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produitsPlateau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($produitsPlateau->id !== $produit->id): ?> 
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="#" class="img-prod"><img class="img-fluid" src="<?php echo e($publicImageStorage); ?>/cover_images/<?php echo e($produitsPlateau->product_image); ?>" alt="<?php echo e($produitsPlateau->product_image); ?>">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#"><?php echo e($produitsPlateau->nom_produit); ?></a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="price-sale"><?php echo e($produitsPlateau->prix); ?></span></p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="<?php echo e(URL::to('/single_product/'.$produitsPlateau->id)); ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="<?php echo e(URL::to('/ajouter_au_panier/'.$produitsPlateau->id)); ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/client/single_product.blade.php ENDPATH**/ ?>