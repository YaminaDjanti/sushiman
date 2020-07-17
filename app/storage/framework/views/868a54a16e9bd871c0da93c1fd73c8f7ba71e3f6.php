


<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h4>Gestion des rôles</h4>
                        </div>
                        <div class="pull-right">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Rôle-créer')): ?>
                            <a class="btn btn-primary" href="<?php echo e(route('roles.create')); ?>"> Créer un nouveau rôle</a>
                           
                            <?php endif; ?>
                        </div>
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
                            <th width="280px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$i); ?></td>
                            <td><?php echo e($role->name); ?></td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Rôle-éditer')): ?>
                                    <a class="btn btn-outline-primary text-dark" href="<?php echo e(route('roles.edit',$role->id)); ?>">Modifier</a>
                                <?php endif; ?>
                                <a class="btn btn-outline-info text-dark" href="<?php echo e(route('roles.show',$role->id)); ?>">Consulter</a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Rôle-supprimer')): ?>
                                    <?php echo Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']); ?>

                                        <?php echo Form::submit('Supprimer', ['class' => 'btn  btn-outline-danger']); ?>

                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $roles->render(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>