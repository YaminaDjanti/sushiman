@extends('layouts.appadmin')

@section('content')
<?php
  $sliders=DB::table('sliders')
    ->get();

$increment = 1;
$publicImageStorage='http://localhost/sushiman/sushiman/public/storage';

?>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Gestion des photos de couvertures Accueil du site et Pages</h4>
                </div>
                <div class="pull-right">
               
                    <a class="btn btn-primary" href="{{URL::to('/admin/ajouterslider')}}"> Ajouter nouvelle photo de couverture</a>
                   
                    
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
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Sous-titre</th>
                        <th>Status</th>
                        <th>Actions</th>
   
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider)
                        
                    <tr>
                    <td>{{$increment}}</td>
                        <td><img src="{{$publicImageStorage}}/slider_images/{{$slider->slider_image}}" alt="{{$slider->slider_image}}">
                          </td>
                        <td>{{$slider->description1}}</td>
                        <td>{{$slider->description2}}</td>
                        @if($slider->status  == 1)
                        <td>
                          <label class="badge badge-success">Activé</label>
                        </td>
                        @else
                        <td>
                          <label class="badge badge-danger">désactivé</label>
                        </td>
                        @endif
                        <td>
                         @can('Slider-éditer')
                            <button class="btn btn-outline-info">
                            <a href="{{URL::to('/admin/edit_slider/'.$slider->id)}}">Modifier</a>
                              </button>
                          @endcan
                          @can('Slider-supprimer')
                            <button class="btn btn-outline-danger"><a  href="{{URL::to('/admin/supprimer_slider/'.$slider->id)}}" id="delete">Supprimer</a></button>
                          @endcan
                          @can('Slider-Statut')
                          
                          @if($slider->status  == 1)
                            <button class="btn btn-outline-warning"><a href="{{URL::to('/admin/desactiver_slider/'.$slider->id)}}">Désactiver</a></button>
                              @else
                                <button class="btn btn-outline-success"><a href="{{URL::to('/admin/activer_slider/'.$slider->id)}}">Activer</a></button>
                              @endif
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