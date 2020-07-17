
<?php $__env->startSection('title'); ?>
   La Carte
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
	$sliders=DB::table('sliders')
            ->where('status',1)
			->first();
	
	$categories=DB::table('categories')
	->get();
	
	$publicImageStorage='http://localhost/sushiman/sushiman/public/storage';
	
	$anchor = 'produitsList';
	
	?>
		
   

	<div class="hero-wrap hero-bread" style="background-image: url('<?php echo e($publicImageStorage); ?>/slider_images/<?php echo e($sliders->slider_image); ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" id="produitsList">La Carte M.Sushi</h1>
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
	<section class="ftco-section" >
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category" >
						<li><a href="<?php echo e(URL::to('/shop#produitsList')); ?>">Tous</a></li>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="<?php echo e(URL::to('/select_by_cat/'.$categorie->nom)); ?>">
								<?php echo e($categorie->nom); ?></a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					</ul>
					
					<?php if(isset($anchor)): ?>
    					<input type="hidden" name="anchor" value="<?php echo e($anchor); ?>">
					<?php endif; ?>
					

					
    			</div>
    		</div>
    		 <div class="row">
				<?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-6 col-lg-3 ftco-animate hauteur-limite-card pt-2">
						<div class="product">
							<a href="<?php echo e(URL::to('/single_product/'.$produit->id)); ?>" class="img-prod card-img d-block"><img class="img-fluid" src="<?php echo e($publicImageStorage); ?>/cover_images/<?php echo e($produit->product_image); ?>" alt="<?php echo e($produit->product_image); ?>">
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="<?php echo e(URL::to('/single_product/'.$produit->id)); ?>"><?php echo e($produit->nom_produit); ?></a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span class="price-sale"><?php echo e($produit->prix); ?> €</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="<?php echo e(URL::to('/single_product/'.$produit->id)); ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<?php if($produit->categorie !== 'Formules du midi'): ?>
										<a href="<?php echo e(URL::to('/ajouter_au_panierPageCarte/'.$produit->id)); ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										<?php endif; ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div> 
			
    		 <div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<?php echo e($produits->links()); ?>

            		</div>
          		</div>
        	</div> 
    	</div>
    </section>


 
    
	<?php $__env->stopSection(); ?>


    
  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/client/shop.blade.php ENDPATH**/ ?>