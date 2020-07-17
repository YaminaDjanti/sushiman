@extends('layouts.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter allergene</h4>
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
                    'action' => 'AllergeneController@sauver_allergene',
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data')) }}
                    <fieldset>
                    <div class="form-group {{$errors->has('name')? 'has-error': ''}}">
                        <label for="cname">Nom de l'allergene</label>
                        <input id="cname" class="form-control" name="name" minlength="2" type="text" value="{{old('name')}}" required>
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>
                   
                    
                    <input class="btn btn-primary" type="submit" value="Ajouter allergene">
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
            </div>
        </div>
  @endsection