@extends('layouts.app')
@section('title')
   La Carte
@endsection

@section('content')
<?php
	$sliders=DB::table('sliders')
            ->where('status',1)
			->first();
	
	$categories=DB::table('categories')
	->get();
	
	$publicImageStorage='http://localhost/sushiman/sushiman/public/storage';
	
	$anchor = 'produitsList';
	
	?>
		
   

	<div class="hero-wrap hero-bread" style="background-image: url('{{$publicImageStorage}}/slider_images/{{$sliders->slider_image}}');">
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

		@if ($message)    
		<p class="alert alert-success mb-0">
			<?php
				echo $message;
				Session::put('message',null);
			?>
		</p>
		@endif
	<section class="ftco-section" >
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category" >
						<li><a href="{{URL::to('/shop#produitsList')}}">Tous</a></li>
						@foreach ($categories as $categorie)
							<li><a href="{{URL::to('/select_by_cat/'.$categorie->nom)}}">
								{{$categorie->nom}}</a></li>
						@endforeach
					
					</ul>
					
					@if (isset($anchor))
    					<input type="hidden" name="anchor" value="{{ $anchor }}">
					@endif
					

					
    			</div>
    		</div>
    		 <div class="row">
				@foreach($produits as $produit)
					<div class="col-md-6 col-lg-3 ftco-animate hauteur-limite-card pt-2">
						<div class="product">
							<a href="{{URL::to('/single_product/'.$produit->id)}}" class="img-prod card-img d-block"><img class="img-fluid" src="{{$publicImageStorage}}/cover_images/{{$produit->product_image}}" alt="{{$produit->product_image}}">
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="{{URL::to('/single_product/'.$produit->id)}}">{{$produit->nom_produit}}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span class="price-sale">{{$produit->prix}} €</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="{{URL::to('/single_product/'.$produit->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										@if($produit->categorie !== 'Formules du midi')
										<a href="{{URL::to('/ajouter_au_panierPageCarte/'.$produit->id)}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										@endif
										
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div> 
			
    		 <div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						{{$produits->links()}}
            		</div>
          		</div>
        	</div> 
    	</div>
    </section>


 
    
	@endsection


    
  