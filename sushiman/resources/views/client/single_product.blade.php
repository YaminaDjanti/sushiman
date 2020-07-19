@extends('layouts.app')
@section('title')
    
    
{{--{{serialize($data)}}--}}


@endsection

@section('content')
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
    
	<div class="hero-wrap hero-bread" style="background-image: url('{{$publicImageStorage}}/slider_images/{{$sliders->slider_image}}');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
              <h1 class="mb-0 bread">{{$produit->nom_produit}}</h1>
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
    <section class="ftco-section mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate text-center">
                    <a href="" class="image-popup mb-2"><img src="{{$publicImageStorage}}/cover_images/{{$produit->product_image}}" class="img-fluid" alt="{{$produit->product_image}}"></a>
                    <div class="pt-2">
                        @if ($produit->description_produit !== ' ')
                            <h4 class="mt-2 text-left">Composition :</h4>
                            <p class="subPrice">
                                <span>{{$produit->description_produit}} </span></p>

                        @endif    
                    </div>
                    <div>
                        @if ($produit->allergenes !== ' ')
                            <p class="subPrice text-left">
                                <span class="mt-2 text-left h5">Information complémentaire : </span>
                                <span>{{$produit->allergenes}} </span></p>
                        @endif 
                    </div>
                     <div class="text-left pt-2">
                        @if ($produit->categorie === 'Formules du midi')
                      
                        <h4 class="mt-2 text-left">Premier accompagnement de votre formule :</h4>
                         <select  class=" subPrice" id="accompagnement1" name="accompagnement1" style="color: gray;">
                            <option class="subPrice" style="color: gray;" >Sélectionnez un 1er accompagnement</option>
                                @foreach($accompagnements as $accompagnement)
                                    <option class="subPrice" style="color: gray;" >
                                        {{$accompagnement->nom_produit}} </option>
                                    {{-- <div class="hidden" type="hidden" style="color: gray;"  >{{$accompagnement->id}} </div> --}}
                                @endforeach 
                        </select>   
                        @endif 
                        @if ($produit->categorie === 'Formules du midi')
                
                        <h4 class="mt-2 text-left pt-2">Deuxième accompagnement de votre formule :</h4>
                         <select class=" subPrice" id="accompagnement2" name="accompagnement2" style="color: gray;">
                            <option class="subPrice" style="color: gray;">Sélectionnez un 2nd accompagnement</option>
                                @foreach($accompagnements as $accompagnement)
                                    <option class="" style="color: gray;">
                                        {{$accompagnement->nom_produit}} </option>
                                    {{-- <div class="hidden " type="hidden" style="color: gray;"  >{{$accompagnement->id}} </div> --}}
                                @endforeach 
                        </select>  
                        @endif  
                    </div> 
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3 class="text-center">{{$produit->nom_produit}}</h3>
                    
                    <div>
                        <p class="Price">
                            <span id="prixUnitaire">Prix unitaire TTC : {{$produit->prix}} € </span></p>
                    </div>

                        <div class="row mt-4">
                            <div class="w-100"></div>
                            <div class="d-flex align-items-center">
                                <div class="input-group col-md-6 d-flex mb-3">

                                    {{-- <select name="qty" id="qty" class="custom-select">
                                        @for($i = 1; $i<20; i++)
                                            <option value="{{$i}}"></option>
                                        @endfor
                                    </select> --}}

                                     <span class="input-group-btn mr-2">
                                        <input type="submit" value="-" id="minus" class="quantity-left-minus btn" data-type="minus">
                                    </span>
                                    <input type="text" id="qty" name="quantity" class="form-control input-number" value="1" min="1" max="10">
                                    <span class="input-group-btn ml-2">
                                        <input type="submit" value="+" id="add" class="quantity-right-plus btn"> 
                                    </span>      
                                </div>
                                {{-- <p class="totalPrice"><span id="prixTotal" name="totalPrice">Prix total TTC: {{$produit->prix}} €</span></p> --}}
                            </div>
                            <input type="hidden" name="product_id" id="product_id" value="{{$produit->id}}">
                            <input type="hidden" name="produitCategorie" id="produitCategorie" value="{{$produit->categorie}}">

                           
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
            <h2 class="mb-4">{{$produit->nom_produit}} s'accompagne bien avec :</h2>
        </div>
        </div>   		
        </div>
        <div class="container">
            <div class="row">
                @foreach($produitsPlateaux as $produitsPlateau)
                    @if($produitsPlateau->id !== $produit->id) 
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="#" class="img-prod"><img class="img-fluid" src="{{$publicImageStorage}}/cover_images/{{$produitsPlateau->product_image}}" alt="{{$produitsPlateau->product_image}}">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#">{{$produitsPlateau->nom_produit}}</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="price-sale">{{$produitsPlateau->prix}}</span></p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="{{URL::to('/single_product/'.$produitsPlateau->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="{{URL::to('/ajouter_au_panier/'.$produitsPlateau->id)}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    
@endsection