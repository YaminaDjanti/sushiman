@extends('layouts.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Modifier slider</h4>
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
                {{--<form class="cmxform" id="commentForm" method="get" action="#">--}}
                {{ Form::open(array(
                    'action' => 'SliderController@modifier_slider',
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data')) }}
               
                    <fieldset>
                    <div class="form-group">
                        <label for="descriptionOne">Description 1</label>
                    <input id="descriptionOne" value="{{$sliders->description1}}" class="form-control" name="description1" minlength="2" type="text" >
                    </div>
                    <div class="form-group">
                        <label for="descriptionTwo">Description 2</label>
                        <input id="descriptionTwo" value="{{$sliders->description2}}" class="form-control" name="description2" minlength="2" type="text" >
                    </div>
                    <div class="form-group">
                        <label for="imageSlider">Image</label>
                        {{Form::file('slider_image', 
                            ['id' => 'imageSlider',
                            'class'=> 'form-control'])}}
                       {{-- <input id="image" class="form-control" type="file" name="image">--}}
                     </div>

                   
                    
                    <input class="btn btn-primary" type="submit" value="Modifier slider">
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
            </div>
        </div>
@endsection