@extends('layouts.appadmin')

<?php
  $produits=DB::table('produits')
    ->get();

$increment = 1;

$publicImageStorage='http://localhost/sushiman/sushiman/public/storage';

?>

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Gestion des produits</h4>
                </div>
                <div class="pull-right">
               
                    <a class="btn btn-primary" href="{{URL::to('/admin/ajouterproduit')}}"> Créer un nouveau produit</a>
                   
                   
                </div>
            </div>
        </div>
          
          <?php 
          $message = Session::get('message');
          $message1 =Session::get('message1');
      ?>

      @if ($message)
          <p class="alert alert-success">
              <?php
              echo $message;
              Session::put('message',null);
              ?>
          </p>
      @endif
      @if ($message1)  
          <p class="alert alert-danger">
              <?php
              echo $message1;
              Session::put('message1',null);
              ?>
          </p>
      @endif

          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table jsgrid jsgrid-table">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Image</th>
                        <th>Nom du produit</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th>Allergène</th>
                        <th>Status</th>
                        <th>Actions</th>
                       
                       
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produits as $produit)
                    <tr>
                        <td>{{$increment}}</td>
                        <td class="break"><img  src="{{$publicImageStorage}}/cover_images/{{$produit->product_image}}" alt="{{$produit->product_image}}">
                          </td>
                        <td class="break">{{$produit->nom_produit}}</td>
                        <td class="break">{{$produit->prix}} €</td>
                        <td class="break">{{$produit->categorie}}</td>
                        <td class="break">{{$produit->description_produit}}</td>
                        <td class="break">{{$produit->allergenes}}</td>
                        @if($produit->status  == 1)
                        <td>
                        <label class="badge badge-success">Activé </label>
                        </td>
                        @else
                        <td>
                          <label class="badge badge-danger">Désactivé</label>
                        </td>
                        @endif
                        <td>
                          @can('Produit-Statut')
                            @if($produit->status  == 1)
                              <button class="btn btn-outline-warning"><a href="{{URL::to('/admin/desactiver_produit/'.$produit->id)}}">Désactiver
                              </a></button>
                            @else
                              <button class="btn btn-outline-success"><a href="{{URL::to('/admin/activer_produit/'.$produit->id)}}">Activer 
                              </a></button>
                            @endif
                          @endcan
                          @can('Produit-éditer')
                            <button class="btn btn-outline-info">
                            <a  href="{{URL::to('/admin/edit_produit/'.$produit->id)}}"> Modifier</a>
                            </button>
                          @endcan
                          @can('Produit-supprimer')
                            <button class="btn btn-outline-danger"><a  href="{{URL::to('/admin/supprimer_produit/'.$produit->id)}}" id="delete" >Supprimer</a></button>
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