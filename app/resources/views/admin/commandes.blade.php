@extends('layouts.appadmin')

@section('content')
<?php
  $commandes=DB::table('commandes')
    ->get();

$increment = 1;
$commandes->transform(function($commande,$key){
    $commande->panier = unserialize($commande->panier);
    return $commande;

})

?>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Commandes</h4>
                </div>
                <div class="pull-right">
               
                    <a class="btn btn-primary" href="{{URL::to('/admin/ajouterslider')}}"> Ajouter nouvelle photo de couverture</a>
                   
                    
                </div>
            </div>
        </div>
          
          
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Date</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Panier</th>
                        <th>Paiement_id</th>
                        <th>Actions</th>
   
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($commandes as $commande)
                        
                    <tr>
                    <td>{{$increment}}</td>
                        <td>{{$commande->date}}</td>
                        <td>{{$commande->nom}}</td>
                        <td>{{$commande->adresse}}</td>
                        <td>
                            @foreach($commande->panier->items as $item)
                            
                                {{$item['product_name'].' , '.}}
                            @endforeach
                        </td>
                        <td>{{$commande->paiement_id}}</td>
                       
                        <td>
                         @can('Slider-éditer')
                            <button class="btn btn-outline-primary">
                            <a href="">Voir PDF</a>
                              </button>
                          @endcan
                          
                         
                        </td>
                    </tr>
                    <?php
                      $increment +=1; 
                    ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection