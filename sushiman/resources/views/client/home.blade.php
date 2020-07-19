<!DOCTYPE html>
@extends('layouts.app')

@section('title')
    Accueil
@endsection
@section('content')
    <?php
        $categories=DB::table('categories')
        ->get();
        $sliders=DB::table('sliders')
            ->where('status',1)
            ->get();
        $produitsPlateaux=DB::table('produits')
            ->where('categorie','Plateaux')
            ->where('status',1)
            ->paginate(2);
        $formuleMidis=DB::table('produits')
            ->where('categorie','Formules du midi')
            ->where('status',1)
            ->paginate(6);  
        
            $anchor = 'produitsList';  
       
    ?>
   

    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            @foreach ($sliders as $slider)
                
            <div class="slider-item" style="background-image: url(storage/slider_images/{{$slider->slider_image}});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">{{$slider->description1}}</h1>
                        <h2 class="subheading mb-4">{{$slider->description2}}</h2>
                        <p><a href="{{URL::to('/about')}}" class="btn btn-primary" id="produitsList">Découvrir</a></p>
                        </div>
        
                    </div>
                </div>
            </div>
            @endforeach
          
   
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
    </section>
        
    <section class="ftco-section bg-light">
            <div class="container">
                <div class="heading-section ftco-animate text-center">

                    @if (isset($anchor))
    					<input type="hidden" name="anchor" value="{{ $anchor }}">
                    @endif
                    
                    <span class="subheading text-center" >Nos garanties</span>  
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

    <section class="">
    	<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="my-4" >Nos Plateaux </h2>
                </div>
            </div>   		
    	</div>
    	<div class="container" id="containerPlateaux">
    		<div class="row">
                @foreach($produitsPlateaux as $produitsPlateau)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{URL::to('/single_product/'.$produitsPlateau->id)}}" class="img-prod"><img class="img-fluid" src="storage/cover_images/{{$produitsPlateau->product_image}}" alt="{{$produitsPlateau->product_image}}"> 
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{URL::to('/single_product/'.$produitsPlateau->id)}}">{{$produitsPlateau->nom_produit}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="price-sale">{{$produitsPlateau->prix}} €</span></p>
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
                @endforeach
            </div> 
            <div class="row mb-5">
				<div class="col text-center">
					<div class="block-27">
						{{$produitsPlateaux->links()}}
              
            		</div>
          		</div>
        	</div>
            {{-- <div class="row">
                <div class="col-md-12"> {{$produitsPlateaux->links()}}</div>
            </div> --}}
            <div class="text-center mb-4">
                <a href="{{URL::to('/select_by_cat/Plateaux')}}" class="btn btn-primary btn-outline-primary">Voir tous les plateaux</a>
            
            </div>        
        </div>
        
    	<div class="container mt-3">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="my-4 ">Nos Formules du Midi </h2>
                </div>
            </div>   		
            <div class="row">
                @foreach($formuleMidis as $formuleMidi)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{URL::to('/single_product/'.$formuleMidi->id)}}" class="img-prod"><img class="img-fluid" src="storage/cover_images/{{$formuleMidi->product_image}}" alt="{{$formuleMidi->product_image}}">
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{URL::to('/single_product/'.$formuleMidi->id)}}">{{$formuleMidi->nom_produit}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="price-sale">{{$formuleMidi->prix}} €</span></p>
                                    </div>
                                        </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="{{URL::to('/single_product/'.$formuleMidi->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        {{-- <a href="{{URL::to('/ajouter_au_panier/'.$formuleMidi->id)}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>    --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>    
            <div class="text-center mb-4">
                <a href="{{URL::to('/select_by_cat/Formules du midi')}}" class="btn btn-primary btn-outline-primary">Voir toutes les formules</a>
            </div> 
        </div>
        <div class="container my-3">
            <div class="row justify-content-center">
                
                    <div class="col-lg-4 shadow-sm p-3 mb-3 bg-white rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            <h2 class="h5">Accompagnements</h2>
                            <img class="rounded-circle mb-2" src="frontend/images/accompagnement.jpg" alt="Accompagnement" width="100" height="100">
                        </div>
                      <p><a class="btn btn-primary btn-outline-primary mt-3" href="{{URL::to('/select_by_cat/Accompagnements')}}" role="button">Voir tous les accompagnements &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 shadow-sm p-3 mb-3 bg-white rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            <h2>Desserts</h2>
                            <img class="rounded-circle mb-2" src="frontend/images/mangue.jpg" alt="Desserts" width="100" height="100">
                        </div><!-- /.D-flex ---> 
                        <p><a class="btn btn-primary btn-outline-primary mt-3" href="{{URL::to('/select_by_cat/Les desserts')}}" role="button">Voir tous les desserts &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 shadow-sm p-3 mb-3 bg-white rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            <h2>Boissons</h2>
                            <img class="mb-2" src="frontend/images/badoit_50cl.jpg" alt="boissons" width="120" height="100">
                        </div><!-- /.D-flex ---> 
                      <p><a class="btn btn-primary btn-outline-primary mt-3" href="{{URL::to('/select_by_cat/Boissons')}}" role="button">Voir toutes les boissons &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                  </div><!-- /.row -->
              
            </div>

        </div>
        <div class="text-center mb-4">
            <a href="{{URL::to('/shop')}}" class="btn btn-primary btn-lg" >Voir tous les produits</a>

          </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading text-center" id="services">Livraison</span>
                        <h2 class="mb-4">Au restaurant ou chez vous, c'est vous qui choisissez</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{asset('frontend/images/eat-aemporter2.jpg')}}" alt="Card image cap">
                        <div class="card-body card-height">
                            <h5 class="card-title text-center h3">Récupérez vos commandes à emporter</h5>
                            <p class="card-text text-justify">Une petite faim? Envie de déguster nos spécialités chez vous? Profitez de la vente à emporter, sans montant minimum. </p>
                            <p class="card-text text-justify"> Choisissez votre repas sur notre site, payez en ligne et venez au magasin récupérer votre commande pour un temps moyen de 30 minutes.                             
                            </p>
                                <div class="d-flex justify-content-center align-items-center mb-2">
                                <div class="btn-group">
                                <button id="emporter-toggle" type="button" class="btn btn-sm btn-outline-secondary">Vérifier les horaires d'ouverture
                                    <span type="button" class="btn btn-sm "><i class="fas fa-arrow-circle-down fa-2x i-arrow-down"></i></span>
                                </button>
                                </div>
                                
                            </div>
                            <div class="voiremporter mt-2">
                                <p  class="my-2"> Horaires durant lesquelles vous pouvez passer commandes:</p>
                                <p class="text-bold text-center"> LUNDI au SAMEDI : de 10h15 à 13h30</p>
                                <p class="text-bold text-center">  TOUS les SOIRS : de 18h00 à 21h30</p>
                                <p class="text-justify"><i class="fas fa-info-circle i-warning"></i> Hors jours fériés <br>
                                Passé ce délai, nous ne pouvons vous garantir la livraison. Nous vous suggérons de nous contacter pour toutes questions supplémentaires.</p>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{asset('frontend/images/eat-livraison.2.jpg')}}" alt="Card image cap">
                            <div class="card-body card-height">
                                    <h5 class="card-title text-center h3">Notre livreur M.Sushi pour vos livraisons</h5>
                                    <p class="card-text text-justify">Notre livreur M.Sushi est à disposition pour vous déposer vos commandes. Lors de votre achat, avant le paiement de votre commande, laisser vous guider en précisant votre adresse.</p>
                                    <p class="card-text text-justify">    <i class="fas fa-exclamation-triangle i_warning"></i> Attention, la commande doit être supérieure à 20 euros TTC et l'adresse située à Bordeaux.
                                    </p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <button id="livraison-toggle" type="button" class="btn btn-sm btn-outline-secondary">Voir les lieux de livraison
                                            <span type="button" class="btn btn-sm "><i class="fas fa-arrow-circle-down fa-2x i-arrow-down">
                                                    </i>
                                            </span>
                                        </button>
                                    </div>
                                </div>

                                <div class="voirlivraison">
                                    <ul class="mt-2"><span class="btn-premier " style="background-color: #EDAE49; color: white;">Zones desservies:</span>
                                        <li>Bruges</li>
                                        <li>Bordeaux nord jusqu'à bordeaux Lac - limité par la rocade Nord</li>
                                        <li>Quartier des Chartrons</li>
                                        <li>Du Jardin Public jusqu'à Gambetta</li>
                                        <li>Quartier Caudéran</li>
                                        <li>Parc Bordelais</li>
                                    </ul>
                                
                                <iframe  src="https://www.google.com/maps/d/embed?mid=1v9FR18pcMgzR7TgtFZdgEqaThGYuG_gw&z=11" style="width: 100%;  top: 0px; left: 0px; border: none;" width="640" height="480"></iframe>
                                

                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcFolZSY3RHe9usclAGqOdxXTP5lsCFWg&callback=initMap"
                                ></script>
                            
                                <ul><span class="btn-danger">Zones non desservies:</span> 
                                    <li>Bordeaux rive droite</li>
                                    <li>Bordeaux Sud | St Michel |Gare St Jean</li>
                                    <li>Bordeaux Mériadeck</li>
                                    <li>Mérignac</li>
                                </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{asset('frontend/images/eat-surplace2.jpg')}}" alt="Card image cap">
                        <div class="card-body card-height">
                            <h5 class="card-title text-center h3">Prenez une table dans notre restaurant</h5>
                            <p class="card-text text-justify">Situé au coeur du Bouscat dans une ambiance chaleureuse et familiale, retrouvez tout l'esprit M.Sushi avec toute notre équipe en profitant d'un moment à table.</p>
                            <p class="card-text text-justify">Vous pouvez réserver jusqu'à 10 personnes. Vous pouvez nous contacter pour réserver</p>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="btn-group">
                                        <button id="place-toggle" type="button" class="btn btn-sm btn-outline-secondary">Voir notre numéro pour réserver
                                            <span type="button" class="btn btn-sm "><i class="fas fa-arrow-circle-down fa-2x i-arrow-down"></i>
                                        </button> </span>
                                    </div>
                                
                                </div>
                                <div class="voirsurplace ">
                                    <p class="text-justify mt-2">Vous pouvez cliquer sur le numéro ci-dessous pour nous contacter.</p>
                                    <div class="icon mr-2 d-flex justify-content-center align-items-center">
                                        
                                        <span class="icon-phone2"></span>
                                        <a href="tel:0556291152"><span class="text"> 05 56 29 11 52</span></a>
                                    </div>
                                    <div class=" mt-2 text-center">
                                        <p  class="my-2"> Horaires d'ouverture du restaurant</p>
                                        <p class="text-bold text-center"> LUNDI au SAMEDI : de 10h15 à 14h00</p>
                                        <p class="text-bold text-center">  TOUS les SOIRS : de 18h00 à 22h00</p>
                                          
                                    </div>
                                    

                                </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="temoignages">
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
                    class="btn btn-primary btn-outline-primary">Voir tous les avis</a>
    
            </div>         
        </div>
    </section>
    
   
    



 

    <hr class="mb-4">




 
  

    @endsection