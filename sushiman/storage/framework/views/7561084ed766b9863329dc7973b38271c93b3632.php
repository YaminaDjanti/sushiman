

<?php $__env->startSection('content'); ?>
<?php
  $sliders=DB::table('sliders')
    ->get();

$increment = 1;

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
               
                    <a class="btn btn-primary" href="<?php echo e(URL::to('/admin/ajouterslider')); ?>"> Ajouter nouvelle photo de couverture</a>
                   
                    
                </div>
            </div>
        </div>
          
          <?php 
                        $message = Session::get('message');
                        $message1 =Session::get('message1');
                    ?>

                    <?php if($message): ?>
                        <p class="alert alert-success">
                            <?php
                            echo $message;
                            Session::put('message',null);
                            ?>
                        </p>
                    <?php endif; ?>
                    <?php if($message1): ?>  
                        <p class="alert alert-danger">
                            <?php
                            echo $message1;
                            Session::put('message1',null);
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
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Sous-titre</th>
                        <th>Status</th>
                        <th>Actions</th>
   
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <tr>
                    <td><?php echo e($increment); ?></td>
                        <td><img src="storage/slider_images/<?php echo e($slider->slider_image); ?>" alt="<?php echo e($slider->slider_image); ?>">
                          </td>
                        <td><?php echo e($slider->description1); ?></td>
                        <td><?php echo e($slider->description2); ?></td>
                        <?php if($slider->status  == 1): ?>
                        <td>
                          <label class="badge badge-success">Activé</label>
                        </td>
                        <?php else: ?>
                        <td>
                          <label class="badge badge-danger">désactivé</label>
                        </td>
                        <?php endif; ?>
                        <td>
                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider-éditer')): ?>
                            <button class="btn btn-outline-info">
                            <a href="<?php echo e(URL::to('/admin/edit_slider/'.$slider->id)); ?>">Modifier</a>
                              </button>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider-supprimer')): ?>
                            <button class="btn btn-outline-danger"><a  href="<?php echo e(URL::to('/admin/supprimer_slider/'.$slider->id)); ?>" id="delete">Supprimer</a></button>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider-Statut')): ?>
                          
                          <?php if($slider->status  == 1): ?>
                            <button class="btn btn-outline-warning"><a href="<?php echo e(URL::to('/admin/desactiver_slider/'.$slider->id)); ?>">Désactiver</a></button>
                              <?php else: ?>
                                <button class="btn btn-outline-success"><a href="<?php echo e(URL::to('/admin/activer_slider/'.$slider->id)); ?>">Activer</a></button>
                              <?php endif; ?>
                          <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                      $increment +=1; 
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
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/sliders.blade.php ENDPATH**/ ?>