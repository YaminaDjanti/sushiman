
<?php $__env->startSection('title'); ?>
    Paiement
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
$sliders=DB::table('sliders')
		->where('status',1)
		->first();


$publicImageStorage='http://localhost/sushiman/sushiman/public/storage' 
?>
<?php
									
									
$totalCommandePanier= Session::get('panier')->totalPrice
?>
   

    <div class="hero-wrap hero-bread" style="background-image: url('<?php echo e($publicImageStorage); ?>/slider_images/<?php echo e($sliders->slider_image); ?>');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"> <span>Paiement</span></p>
            <h1 class="mb-0 bread">Paiement</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
			<?php echo e(Form::open(array(
				'action' => 'ProduitController@payer',
				'method' => 'POST',
				'class' => 'form-horizontal',
				'id' => 'checkout-form',
				'enctype' => 'multipart/form-data'
				))); ?>

						
							<?php echo e(csrf_field()); ?>

				<fieldset>
					<h3 class="mb-4 billing-heading">Vos informations</h3>
					<?php 
                        $error = Session::get('error');
                       
                    ?>
                    <?php if($error): ?>
                        <p class="alert alert-danger">
                            <?php
                            echo $error;
                            Session::put('error',null);
                            ?>
                        </p>
                    <?php endif; ?>
                   
						<div class="row align-items-end">
							<div class="col-md-6">
								<div class="form-group  <?php echo e($errors->has('prenom')? 'has-error': ''); ?>">
									<label for="prenom">Prénom</label>
									<input id="prenom" type="text" class="form-control" name="prenom">
									<?php echo $errors->first('prenom', '<span class="help-block">:message</span>'); ?>

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group  <?php echo e($errors->has('nom')? 'has-error': ''); ?>">
									<label for="nom">Nom de famille</label>
									<input id="nom" type="text" class="form-control" name="nom">
									<?php echo $errors->first('nom', '<span class="help-block">:message</span>'); ?>

								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group  <?php echo e($errors->has('email')? 'has-error': ''); ?>">
									<label for="addresseEmail">adresse email</label>
									<input id="addresseEmail" type="text" class="form-control" name="email">
									<?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

								</div>
							</div>
							<div class="row align-items-end">
								<div class="col-md-12">
									<div class="form-group mt-4">
										<div class="radio">
											<label class="mr-3 btn btn-secondary btn-secondary-outline">
												<input class="btnRadio" type="radio" name="optradio" id="aEmporter" checked> Commander à emporter </label>
										
											<?php if($totalCommandePanier > 20): ?>	
												<label class="btn btn-secondary btn-secondary-outline hidden">
													<input id="livraisonDisponible" type="radio" name="optradio" class="hidden"> Commander en livraison
												</label>
											
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							
							
							<h3 class="mb-4 billing-heading livraisonDisponible">Vos informations pour la livraison</h3>
							
								<div class="col-md-12 livraisonDisponible">
									<div class="form-group">
										<label for="adressePostale">Adresse postale*</label>
										<input id="adressePostale" type="text" class="form-control" name="adresse">
									</div>
								</div>

								<div class="w-100"></div>
								
								<div class="col-md-6 livraisonDisponible">
									<div class="form-group">
										<label for="codePostal">Code Postal*</label>
										<input id="codePostal" type="text" class="form-control" placeholder="">
									</div>
								</div>
								
									<div class="col-md-6 livraisonDisponible">
										<div class="form-group">
											<label for="towncity">Ville</label>
											<input type="text" class="form-control" placeholder="Bordeaux">
										</div>
									</div>
								<div class="w-100"></div>
									<div class="col-md-12 livraisonDisponible">
										<div class="form-group">
											<label for="téléphone">Numéro de téléphone*</label>
											<input id="téléphone" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-12 livraisonDisponible">
										<div class="form-group">
											<label for="complémentadresse">Précisions</label>
											<textarea id="complémentadresse" name="textMessage" cols="30" rows="5" class="form-control" placeholder="Vos précisions pour la livraison"></textarea>
											
										</div>
									</div>
								
								<div class="w-100"></div>


						
								<h3 class="mb-4 billing-heading">Vos informations de paiement</h3>

							<div class="col-md-12">
								<div class="form-group">
									<label for="emailaddress">Nom du porteur de la carte de paiement</label>
									<input type="text" id="card-name" class="form-control" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress">Numéro de la carte</label>
									<input type="text" id="card-number" class="form-control" placeholder="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="emailaddress">CVC</label>
									<input type="text" id="card-cvc" class="form-control" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress"> Mois d'expiration</label>
									<input type="text" id="card-expiry-month" class="form-control" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress"> Année d'expiration</label>
									<input type="text" id="card-expiry-year" class="form-control" placeholder="">
								</div>
							</div>
							
							
							<div class="w-100"></div>
							
						</div>	
					</fieldset>	
					
					
		
		<!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Montant total de votre panier</h3>
		    					<hr>
		    					<p class="d-flex total-price">
									<span>Total</span>
									

		    						<span class="mb-4 billing-heading"><?php echo e(number_format((float)$totalCommandePanier, 2,'.','')); ?> €</span>
								</p>
								<?php if($totalCommandePanier > 20): ?>	
									<p class="alert alert-success">Vous pouvez bénéficiez de la livraison gratuitement!</p>
								<?php endif; ?>
								</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Paiement par carte bancaire</h3>
									<div class="form-group">
										<div class="col-md-12">
											<p class="h6">Carte bancaire accepté</p>
											<ul>
												<li>Visa</li>
												<li>Mastercard</li>
												<li>Electron</li>
						
											</ul>
										</div>
									</div>
									
									
									<input type="submit" class="btn btn-primary py-3 px-4" value="Acheter">
									<?php echo e(Form::close()); ?>	
					</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

	

  

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
	</script>
	<script src="https://js.stripe.com/v2/"> </script>
	<script src="src/js/paiement.js"> </script>
	 <?php $__env->stopSection(); ?>
	 


	 

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/client/paiement.blade.php ENDPATH**/ ?>