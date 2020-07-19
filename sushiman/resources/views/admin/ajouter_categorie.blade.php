@extends('layouts.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter catégorie</h4>
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
                {{ Form::open(array(
                    'action' => 'CategoryController@sauver_category',
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data')) }}
                    <fieldset>
                    <div class="form-group">
                        <label for="cname">Nom de la nouvelle Catégorie</label>
                        <input id="cname" class="form-control" name="name" minlength="2" type="text" required>
                    </div>
                    
                    
                    <input class="btn btn-primary" type="submit" value="Ajouter Catégorie">
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
            </div>
        </div>
  @endsection