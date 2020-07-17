

<?php
  $produits=DB::table('produits')
    ->get();

$increment = 1;

$publicImageStorage='http://localhost/sushiman/sushiman/public/storage';

?>

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">

          <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Gestion des produits</h4>
                </div>
                <div class="pull-right">
               
                    <a class="btn btn-primary" href="<?php echo e(URL::to('/admin/ajouterproduit')); ?>"> Créer un nouveau produit</a>
                   
                   
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
                <table id="order-listing" class="table jsgrid jsgrid-table">
                  <thead>
                    <tr>
                        <th>N°</th>
                        <th>Image</th>
                        <th>Nom du produit</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th>Allergène</th>
                        <th>Status</th>
                        <th>Actions</th>
                       
                       
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($increment); ?></td>
                        <td class="break"><img  src="<?php echo e($publicImageStorage); ?>/cover_images/<?php echo e($produit->product_image); ?>" alt="<?php echo e($produit->product_image); ?>">
                          </td>
                        <td class="break"><?php echo e($produit->nom_produit); ?></td>
                        <td class="break"><?php echo e($produit->prix); ?> €</td>
                        <td class="break"><?php echo e($produit->categorie); ?></td>
                        <td class="break"><?php echo e($produit->description_produit); ?></td>
                        <td class="break"><?php echo e($produit->allergenes); ?></td>
                        <?php if($produit->status  == 1): ?>
                        <td>
                        <label class="badge badge-success">Activé </label>
                        </td>
                        <?php else: ?>
                        <td>
                          <label class="badge badge-danger">Désactivé</label>
                        </td>
                        <?php endif; ?>
                        <td>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Produit-Statut')): ?>
                            <?php if($produit->status  == 1): ?>
                              <button class="btn btn-outline-warning"><a href="<?php echo e(URL::to('/admin/desactiver_produit/'.$produit->id)); ?>">Désactiver
                              </a></button>
                            <?php else: ?>
                              <button class="btn btn-outline-success"><a href="<?php echo e(URL::to('/admin/activer_produit/'.$produit->id)); ?>">Activer 
                              </a></button>
                            <?php endif; ?>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Produit-éditer')): ?>
                            <button class="btn btn-outline-info">
                            <a  href="<?php echo e(URL::to('/admin/edit_produit/'.$produit->id)); ?>"> Modifier</a>
                            </button>
                          <?php endif; ?>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Produit-supprimer')): ?>
                            <button class="btn btn-outline-danger"><a  href="<?php echo e(URL::to('/admin/supprimer_produit/'.$produit->id)); ?>" id="delete" >Supprimer</a></button>
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
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/produits.blade.php ENDPATH**/ ?>