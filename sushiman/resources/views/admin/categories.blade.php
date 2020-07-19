@extends('layouts.appadmin')

@section('content')
<?php
  $categories=DB::table('categories')
    ->get();

$increment = 1;

?>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Catégories</h4>
          <p>Vos Catégories ne peuvent être ni modifiées, ni supprimées</p>
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
                    @foreach($categories as $categorie)
                    <tr>
                    <td>{{$increment}}</td>
                      <td>{{$categorie->nom}}</td>
                      {{--
                      
                        <td>
                        @can('Catégorie-éditer')
                          <button class="btn btn-outline-primary">
                          <a href="{{URL::to('/edit_categorie/'.$categorie->id)}}">Modifier </a>
                          </button>
                        @endcan
                        @can('Catégorie-supprimer')
                          <button class="btn btn-outline-danger"><a  href="{{URL::to('/supprimer_categorie/'.$categorie->id)}}" id="delete" >Supprimer</a></button>
                        @endcan
                      </td>--}}
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