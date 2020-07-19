

<?php $__env->startSection('content'); ?>
<?php
  $commandes=DB::table('commandes')
    ->get();

$increment = 1;
$commandes->transform(function($commande,$key){
    $commande->panier = unserialize($commande->panier);
    return $commande;

})

?>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Commandes</h4>
                </div>
                <div class="pull-right">
               
                    <a class="btn btn-primary" href="<?php echo e(URL::to('/admin/ajouterslider')); ?>"> Ajouter nouvelle photo de couverture</a>
                   
                    
                </div>
            </div>
        </div>
          
          
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Date</th>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Panier</th>
                        <th>Paiement_id</th>
                        <th>Actions</th>
   
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <tr>
                    <td><?php echo e($increment); ?></td>
                        <td><?php echo e($commande->date); ?></td>
                        <td><?php echo e($commande->nom); ?></td>
                        <td><?php echo e($commande->adresse); ?></td>
                        <td>
                            <?php $__currentLoopData = $commande->panier->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <?php echo e($item['product_name'].' , '); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e($commande->paiement_id); ?></td>
                       
                        <td>
                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider-éditer')): ?>
                            <button class="btn btn-outline-primary">
                            <a href="<?php echo e(URL::to('/voir_pdf/'.$commande->id)); ?>">Voir PDF</a>
                              </button>
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
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/commandes.blade.php ENDPATH**/ ?>