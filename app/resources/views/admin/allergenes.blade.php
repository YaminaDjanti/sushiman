@extends('layouts.appadmin')

<?php
  $allergenes=DB::table('allergenes')
    ->get();

$increment = 1;

?>

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Gestion des allergènes de vos produits</h4>
                </div>
                <div class="pull-right">
               
                    <a class="btn btn-primary" href="{{URL::to('/admin/ajouterallergene')}}"> Ajouter nouvelle photo de couverture</a>
                   
                    
                </div>
            </div>
        </div>
          
          <?php 
                    $message = Session::get('message');
                ?>

                @if ($message)    
                <p class="alert alert-success">
                    <?php
                        echo $message;
                        Session::put('message',null);
                    ?>
                </p>
                @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allergenes as $allergene)
                    <tr>
                    <td>{{$increment}}</td>
                      <td>{{$allergene->nom}}</td>
                      <td>
                        @can('Allergène-éditer')
                          <button class="btn btn-outline-info">
                          <a href="{{URL::to('/admin/edit_allergene/'.$allergene->id)}}">Modifier </a>
                          </button>
                        @endcan
                        @can('Allergène-supprimer')
                          <button class="btn btn-outline-danger"><a  href="{{URL::to('/admin/supprimer_allergene/'.$allergene->id)}}" id="delete" >Supprimer</a></button>
                        @endcan
                      </td>
                    </tr>
                    <?php
                          $increment += 1;

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