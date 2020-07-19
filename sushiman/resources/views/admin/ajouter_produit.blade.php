@extends('layouts.appadmin')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter produit</h4>
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
                    'action' => 'ProduitController@sauver_produit',
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                    )) }}
                
                {{csrf_field()}}
                    <fieldset>
                        <div class="form-group {{$errors->has('name')? 'has-error': ''}}" >
                            <label for="nomProduit">Nom Produit :</label>
                            <input id="nomProduit" class="form-control" name="name" minlength="2" type="text" value="{{old('name')}}">
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>
                       
                        <div class="form-group">
                            <?php 
                                $categories = DB::table('categories')
                                                ->get();
                            ?> 
                            <label for="categorieProduit">Catégorie du produit :</label>
                            <select id="categorieProduit" class="form-control" name="category" style="border: 1px solid white;">
                                <option>Sélectionnez une Catégorie</option>
                                    @foreach($categories as $categorie)
                                        <option>{{$categorie->nom}} </option>
                                    @endforeach
                            </select>  
                        </div>

                        <div class="form-group ">
                            <label for="cname">Image</label>
                            {{Form::file('product_image', 
                                ['id' => 'cname',
                                'class'=> 'form-control'])}}
                                
                        </div>

                        <div class="form-group">
                            <h4 class="h6 mb-2">Si présence d'allergène, veuillez cocher :</h4>
                            <?php 
                                $allergenes = DB::table('allergenes')
                                                ->get();
                            ?>
                            @foreach($allergenes as $allergene)
                                <label for="allergeneProduit">{{$allergene->nom}}</label>
                                <input  id="allergeneProduit" name="product_status[]" type="checkbox" value="{{$allergene->nom}}">
                            @endforeach
                                
                                  
                        </div>

                        <div class="form-group">
                            <label for="txtArea">Description du produit :</label>
                            <textarea id="txtArea" rows="10" cols="70" name="description_produit" class="form-control">{{old('description_produit')}}</textarea>
                            
                        </div>
                        <div class="form-group {{$errors->has('price')? 'has-error': ''}}">
                            <label for="prixProduit">Prix (exemple: 10.90) :</label>
                            <input id="prixProduit" class="form-control" type="text" name="price" value="{{old('price')}}">
                            {!! $errors->first('price', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="status">Cochez pour rendre visible sur le site</label>
                            <input id="status" type="checkbox" name="status" value="1">
                        </div>
                        
                        <input class="btn btn-primary" type="submit" value="Ajouter Produit">
                    </fieldset>
                    {{--</form>--}}
                    {{ Form::close() }}
                </div>
            </div>
            </div>
        </div>
  @endsection