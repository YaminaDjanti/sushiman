<!DOCTYPE html>
@extends('layouts.app')
@section('title')
    Conditions de ventes
@endsection

@section('content')
 <?php
        $sliders=DB::table('sliders')
            ->where('status',1)
            ->first();

            
    ?>
		
<div class="hero-wrap hero-bread" style="background-image: url(storage/slider_images/{{$sliders->slider_image}});">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        
        <h1 class="mb-0 bread">Conditions de ventes</h1>
      </div>
    </div>
  </div>
</div>


<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12 justify-content-center align-items-center" >
          <h4 class="mt-3">Qui sommes-nous ?</h4>
          
          <p>SushiM est géré par LOREMIPSUM, SARL enregistrée au RCS lorem 000 000 000, sous le numéro SIRET 0000000000000.
                Le directeur de la publication est madame LOREMIPSUM .</p>

                <h4> Objet</h4>
                <p>SushiM "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, 
                  id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>

                <h4>  Tarifs</h4>
                <p>ptio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, 
                  omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum nece</p>

                <h4> Aire géographique</h4>
                <p>sitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur 
                  a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p>

                <h4> Responsabilité</h4>
                <p>sitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus,
                   ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat." .</p>

                <h4> Données à caractère personnel</h4>
                <p>SLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit  .</p>

                <h4>Règlement des litiges</h4>
                <p> LOREMIPSUM .</p>
        

      </div>
      
    </div>
  </div>
</section>

 
	@endsection


    
  