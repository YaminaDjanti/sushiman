

<?php $__env->startSection('content'); ?>
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

                <?php if($message): ?>    
                <p class="alert alert-success">
                    <?php
                        echo $message;
                        Session::put('message',null);
                    ?>
                </p>
                <?php endif; ?>
                <?php echo e(Form::open(array(
                    'action' => 'AllergeneController@sauver_allergene',
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'))); ?>

                    <fieldset>
                    <div class="form-group <?php echo e($errors->has('name')? 'has-error': ''); ?>">
                        <label for="cname">Nom de l'allergene</label>
                        <input id="cname" class="form-control" name="name" minlength="2" type="text" value="<?php echo e(old('name')); ?>" required>
                        <?php echo $errors->first('name', '<span class="help-block">:message</span>'); ?>

                    </div>
                   
                    
                    <input class="btn btn-primary" type="submit" value="Ajouter allergene">
                    </fieldset>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
            </div>
        </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/ajouter_allergene.blade.php ENDPATH**/ ?>