<!DOCTYPE html>
@extends('layouts.app')
@section('title')
    Mentions légales
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
        
        <h1 class="mb-0 bread">Mentions légales</h1>
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
  
                  <h4> Propriété intellectuelle et droits d'auteurs</h4>
                  <p>S"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.".</p>

                  <h4> Informatique et Libertés</h4>
                  <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                      Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?.</p>

                  <h4> Hébergement</h4>
                  <p>SQuis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, 
                      vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>

                  
  
  
        </div>
        
      </div>
    </div>
  </section>
    
	@endsection


    
  