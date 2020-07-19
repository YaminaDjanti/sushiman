


<?php $__env->startSection('content'); ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>Utilisateurs Management</h4>
                </div>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Utilisateurs-créer')): ?>
                  <div class="pull-right">
                      <a class="btn btn-primary" href="<?php echo e(route('utilisateurs.create')); ?>">Créer un nouvel utilisateur</a>
                  </div>
                <?php endif; ?>
            </div>
        </div>

        <br>
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
          <p><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>
        <br>


        <table class="table">
          <thead>
            <tr>
               <th>Numéro</th>
               <th>Nom</th>
               <th>Email</th>
               <th>Rôles</th>
               <th width="280px">Actions</th>
            </tr> 
          </thead>
          <tbody>
             <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td>
                  <?php if(!empty($user->getRoleNames())): ?>
                    <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <label class="badge badge-success"><?php echo e($v); ?></label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Utilisateurs-éditer')): ?>
                    <a class="btn btn-outline-primary text-dark" href="<?php echo e(route('utilisateurs.edit',$user->id)); ?>">Modifier</a>
                  <?php endif; ?>
                   <a class="btn btn-outline-info text-dark" href="<?php echo e(route('utilisateurs.show',$user->id)); ?>">Consulter</a>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Utilisateurs-supprimer')): ?>
                    <?php echo Form::open(['method' => 'DELETE','route' => ['utilisateurs.destroy', $user->id],'style'=>'display:inline']); ?>

                        <?php echo Form::submit('Supprimer', ['class' => 'btn  btn-outline-danger ']); ?>

                    <?php echo Form::close(); ?>

                  <?php endif; ?>
                </td>
              </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </tbody>
        </table>


        <?php echo $data->render(); ?>

      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/users/index.blade.php ENDPATH**/ ?>