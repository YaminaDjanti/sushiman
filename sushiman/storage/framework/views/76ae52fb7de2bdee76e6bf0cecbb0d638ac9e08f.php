

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Ajouter slider</h4>
                <?php 
                    $message = Session::get('message');
                   
                ?>

                <?php if($message): ?>
                    <p class="alert alert-success">
                        <?php
                        echo $message;
                        Session::put('message',null);
                        ?>
                    </p>
                <?php endif; ?>
                
                <?php echo e(Form::open(array(
                    'action' => 'SliderController@sauver_slider',
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'))); ?>

               
                    <fieldset>
                    <div class="form-group">
                        <label for="descriptionOne">Titre</label>
                        <input id="descriptionOne" class="form-control" name="description1" minlength="2" type="text">
                    </div>
                    <div class="form-group">
                        <label for="descriptionTwo">Sous-titre</label>
                        <input id="descriptionTwo" class="form-control" name="description2" minlength="2" type="text">
                    </div>
                    <div class="form-group">
                        <label for="imageSlider">Image</label>
                        <?php echo e(Form::file('slider_image', 
                            ['id' => 'imageSlider',
                            'class'=> 'form-control'])); ?>

                       
                     </div>

                     <div class="form-group">
                        <label for="status">Cocher pour rendre visible sur le site</label>
                        <input id="status" type="checkbox" name="status" value="1">
                    </div>
                    
                    <input class="btn btn-primary" type="submit" value="Ajouter slider">
                    </fieldset>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/ajouter_slider.blade.php ENDPATH**/ ?>