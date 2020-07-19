@extends('layouts.appadmin')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Modifier produit</h4>
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
              {{--  <form class="cmxform" id="commentForm" method="get" action="#">--}}
                {{ Form::open(array(
                    'action' => 'ProduitController@modifier_produit',
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                    )) }}
                
           
                    <fieldset>
                        <div class="form-group">
                            <label for="nomProduit">Nom Produit</label>
                        <input id="nomProduit" class="form-control" name="name" minlength="2" type="text" value="{{$produits->nom_produit}}" required>
                        </div>
                       
                        <div class="form-group">
                            <?php 
                                $categories = DB::table('categories')
                                                ->where('nom','!=',$produits->categorie)
                                                ->get();
                            ?>
                            <label for="categorieProduit">Catégorie du produit</label>
                                <select id="categorieProduit" class="form-control" name="category">
                                    <option>{{$produits->categorie}}</option>

                                    @foreach($categories as $categorie)
                                        <option>{{$categorie->nom}} </option>
                                    @endforeach
                                </select>  
                        </div>
                        <div class="form-group">
                            <label for="cname">Image</label>
                            {{Form::file('product_image', 
                                ['id' => 'cname',
                                'class'=> 'form-control'])}}
                        {{-- <input id="image" class="form-control" type="file" name="image">--}}
                        </div>
                        <div class="form-group">
                            <?php 
                                $allergenes = DB::table('allergenes')
                                                ->get();
                            ?>
                            {{-- <label for="allergeneProduit">Allergene du produit</label> --}}
                            <h3 class="categoriesAllergene h6">Allergene du produit</h3>
                                {{-- @foreach($allergenes as $allergene)
                                    <label for="allergeneProduit">{{$produits->allergenes}}</label>
                                    <input  id="allergeneProduit" name="product_status[]" type="checkbox" value="{{$produits->allergenes}}">
                                @endforeach --}}
                                
                                
                                
                                @foreach($allergenes as $allergene)
                                     
                                    <label for="allergeneProduit">{{$allergene->nom}}</label>
                                    {{-- @if ()
                                        Faire pour un 
                                        boucler sur {{$produits->allergenes}}
                                    @endif --}}
                                    <input  id="allergeneProduit" name="product_status[]" type="checkbox" value="{{$allergene->nom}}">
                                    
                            @endforeach                                    {{-- <select id="allergeneProduit" class="form-control" name="allergene">
                                        <option>Sélectionner allergene</option>
                                        @foreach($allergenes as $allergene)
                                            <option>{{$allergene->nom}} </option>
                                        @endforeach
                                    </select>   --}}
                                    
                                
                                  
                        </div>
                        <div class="form-group">
                            <label for="txtArea">Description du produit</label>
                            <textarea id="txtArea" rows="10" cols="70" name="description_produit" class="form-control">{{$produits->description_produit}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="prixProduit">Prix</label>
                            <input id="prixProduit" class="form-control" type="text" name="price" value="{{$produits->prix}}" required>
                        </div>
                        
                        
                        <input class="btn btn-primary" type="submit" value="Modifier Produit">
                    </fieldset>
                    {{--</form>--}}
                    {{ Form::close() }}
                </div>
            </div>
            </div>
        </div>
  @endsection