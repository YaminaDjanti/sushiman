

<?php $__env->startSection('content'); ?>
<?php
  $categories=DB::table('categories')
    ->get();

$increment = 1;

?>

<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Catégories</h4>
          <p>Vos Catégories ne peuvent être ni modifiées, ni supprimées</p>
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
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($increment); ?></td>
                      <td><?php echo e($categorie->nom); ?></td>
                      
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
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/categories.blade.php ENDPATH**/ ?>