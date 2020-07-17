

<?php
  $allergenes=DB::table('allergenes')
    ->get();

$increment = 1;

?>

<?php $__env->startSection('content'); ?>
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
               
                    <a class="btn btn-primary" href="<?php echo e(URL::to('/admin/ajouterallergene')); ?>"> Ajouter nouvelle photo de couverture</a>
                   
                    
                </div>
            </div>
        </div>
          
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
                    <?php $__currentLoopData = $allergenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergene): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($increment); ?></td>
                      <td><?php echo e($allergene->nom); ?></td>
                      <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Allergène-éditer')): ?>
                          <button class="btn btn-outline-info">
                          <a href="<?php echo e(URL::to('/admin/edit_allergene/'.$allergene->id)); ?>">Modifier </a>
                          </button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Allergène-supprimer')): ?>
                          <button class="btn btn-outline-danger"><a  href="<?php echo e(URL::to('/admin/supprimer_allergene/'.$allergene->id)); ?>" id="delete" >Supprimer</a></button>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php
                          $increment += 1;

                      ?>
                                      
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/allergenes.blade.php ENDPATH**/ ?>