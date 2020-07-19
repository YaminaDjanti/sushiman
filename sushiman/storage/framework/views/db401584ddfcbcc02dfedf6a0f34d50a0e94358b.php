
<?php $__env->startSection('title'); ?>
    Panier
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php
	$sliders=DB::table('sliders')
			->where('status',1)
			->first();

	$produitsAccompagnements=DB::table('produits')
            ->where('categorie','Accompagnements')
            ->where('status',1)
            ->simplePaginate(2);

	$publicImageStorage='http://localhost/sushiman/sushiman/public/storage'; 
		
	


	?>
   

	<div class="hero-wrap hero-bread" style="background-image: url('storage/slider_images/<?php echo e($sliders->slider_image); ?>');">
		<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
			<h1 class="mb-0 bread">Votre Panier</h1>
			</div>
		</div>
		</div>
	</div>

    <?php
	$totalPrice= 0;
	$tva= 0;
	?>

	<?php if(Session::has('panier')): ?>
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate px-0">
    				<div class="cart-list">
	    				<table class="table" >
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Nom du produit</th>
						        <th>Montant</th>
						        <th>Quantité</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
								<?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="text-center">
								  <td class="product-remove"><a href="<?php echo e(URL::to('/enlever_item/'.$produit['product_id'])); ?>"><span class="ion-ios-close"></span></a></td>

								  <td class="image-prod"><div class="img" style="background-image:url('storage/cover_images/<?php echo e($produit['product_image']); ?>');"></div></td>
								  <td class="product-name">
									  <h3><?php echo e($produit['product_name']); ?></h3> 
								  </td>
								  <td class="price"><?php echo e($produit['product_price']); ?> €</td>
								  <?php echo e(Form::open(array(
									'action' => 'ProduitController@modifierQty',
									'method' => 'POST',
									'class' => 'form-horizontal',
									'enctype' => 'multipart/form-data'))); ?>

									<fieldset>
									  <td class="quantity">
										  <div class="input-group mb-3">
										  	<input type="number" name="quantity" class="quantity form-control input-number" value="<?php echo e($produit['qty']); ?>" min="1" max="100">
										  	<input type="hidden" name="id" class="quantity form-control input-number" value="<?php echo e($produit['product_id']); ?>" min="1" max="100">
										  </div>
										  <div class="input-group mb-3 justify-content-center">
											 <?php echo e(Form::submit('Modifier', ['class'=>'btn btn-primary'])); ?> 
										  </div>
										</td>
									</fieldset>
									<?php echo e(Form::close()); ?>

									<?php
									$totalPrice += $produit['qty']*$produit['product_price'];
									$totalPriceProduct = $produit['qty']*$produit['product_price'];
									$tva += $totalPrice * 0.1;
									$ecartLivraison = 20 - $totalPrice;
									?>
										<td class="poppins">
											<p><?php echo e(number_format((float)$totalPriceProduct, 2,'.','')); ?> €</p>
											
										</td>
								</tr><!-- END TR-->
								
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-8 mt-5 cart-wrap ftco-animate shadow-lg p-3 mb-5 bg-white rounded">
    				
						<div class="container">
								<div class="row justify-content-center mb-3 pb-3">          
									<div class="col-md-12 heading-section text-center ftco-animate">
										<span class="subheading">Les accompagnements</span>
										<h4 class="mb-4 h4">Vous pouvez compléter votre commande</h4>
									</div>
						</div>   		
						</div>
						<div class="container">
							<div class="row">
								<?php $__currentLoopData = $produitsAccompagnements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produitsAccompagnement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-md-6 col-lg-3 ftco-animate">
										<div class="product mb-0">
											<a href="<?php echo e(URL::to('/single_product/'.$produitsAccompagnement->id)); ?>" class="img-prod"><img class="img-fluid" src="<?php echo e($publicImageStorage); ?>/cover_images/<?php echo e($produitsAccompagnement->product_image); ?>" alt="<?php echo e($produitsAccompagnement->product_image); ?>">
												<div class="overlay"></div>
											</a>
											<div class="text pt-3 pb-0 px-3 text-center">
												<h3><a href="<?php echo e(URL::to('/ajouter_au_panierPagePanier/'.$produitsAccompagnement->id)); ?>"><?php echo e($produitsAccompagnement->nom_produit); ?></a></h3>
												<div class="d-flex">
													<div class="pricing">
														<p class="price"><span class="price-sale"><?php echo e($produitsAccompagnement->prix); ?></span></p>
													</div>
												</div>
												<div class="bottom-area d-flex px-3">
													<div class="m-auto d-flex">
														<a href="<?php echo e(URL::to('/single_product/'.$produitsAccompagnement->id)); ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
															<span><i class="ion-ios-menu"></i></span>
														</a>
														<a href="<?php echo e(URL::to('/ajouter_au_panierPagePanier/'.$produitsAccompagnement->id)); ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
															<span><i class="ion-ios-cart"></i></span>
														</a>
						
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
												<?php echo e($produitsAccompagnements->links()); ?>

									  
											</div>
										  </div>
									</div>
						</div>
					
				
    				
    			</div>
    			
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate" style="shadow p-3 mb-5 bg-white rounded">
    				<div class="cart-total mb-3">
    					<h3>Votre commande</h3>
    					
    					<p class="d-flex">
    						<span>Dont TVA</span>
    						<span><?php echo e(number_format((float)$tva, 2,'.','')); ?> €</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total de votre commande</span>
							<span><?php echo e(number_format((float)$totalPrice, 2,'.','')); ?> €</span>
							
						</p>
						<?php if($totalPrice >= 20): ?>
							<p class="alert alert-success">Vous bénéficiez de la livraison gratuitement!</p>
						<?php endif; ?>
						<?php if($totalPrice < 20): ?>

							<p class="alert alert-info"> Pour <?php echo e(number_format((float)$ecartLivraison, 2,'.','')); ?> euros supplémentaires, vous pouvez bénéficiez de la livraison gratuitement!</p>
						<?php endif; ?>

    				</div>
    				<p><a href="<?php echo e(URL::to('/paiement')); ?>" class="btn btn-secondary py-3 px-4">Passer au paiement</a></p>
    			</div>
    		</div>
			</div>
		</section>
	<?php else: ?> 
	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
		  <div class="row d-flex justify-content-center py-5">
			<div class="col-md-12">
				<?php 
                        $success = Session::get('success');  
                    ?>
                    <?php if($success): ?>
                        <p class="alert alert-success">
                            <?php
								echo $success;
								Session::put('success',null);
                            ?>
                        </p>
                    <?php endif; ?>
			</div>
			
		  </div>
		</div>
	  </section>
	<?php endif; ?>

	<?php $__env->stopSection(); ?>
 
	<?php $__env->startSection('scripts'); ?>
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){  
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        // If is not undefined
		            $('#quantity').val(quantity + 1);
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});

		$("input[type='number']").inputSpinner()
	</script>
    
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/client/panier.blade.php ENDPATH**/ ?>