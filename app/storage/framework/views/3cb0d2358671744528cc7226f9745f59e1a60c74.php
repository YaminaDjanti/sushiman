

<?php $__env->startSection('content'); ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Modifier produit</h4>
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
              
                <?php echo e(Form::open(array(
                    'action' => 'ProduitController@modifier_produit',
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                    ))); ?>

                
           
                    <fieldset>
                        <div class="form-group">
                            <label for="nomProduit">Nom Produit</label>
                        <input id="nomProduit" class="form-control" name="name" minlength="2" type="text" value="<?php echo e($produits->nom_produit); ?>" required>
                        </div>
                       
                        <div class="form-group">
                            <?php 
                                $categories = DB::table('categories')
                                                ->where('nom','!=',$produits->categorie)
                                                ->get();
                            ?>
                            <label for="categorieProduit">Catégorie du produit</label>
                                <select id="categorieProduit" class="form-control" name="category">
                                    <option><?php echo e($produits->categorie); ?></option>

                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option><?php echo e($categorie->nom); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>  
                        </div>
                        <div class="form-group">
                            <label for="cname">Image</label>
                            <?php echo e(Form::file('product_image', 
                                ['id' => 'cname',
                                'class'=> 'form-control'])); ?>

                        
                        </div>
                        <div class="form-group">
                            <?php 
                                $allergenes = DB::table('allergenes')
                                                ->get();
                            ?>
                            
                            <h3 class="categoriesAllergene h6">Allergene du produit</h3>
                                
                                
                                
                                
                                <?php $__currentLoopData = $allergenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergene): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     
                                    <label for="allergeneProduit"><?php echo e($allergene->nom); ?></label>
                                    <input  id="allergeneProduit" name="product_status[]" type="checkbox" value="<?php echo e($allergene->nom); ?>">
                                    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                    
                                    
                                
                                  
                        </div>
                        <div class="form-group">
                            <label for="txtArea">Description du produit</label>
                            <textarea id="txtArea" rows="10" cols="70" name="description_produit" class="form-control"><?php echo e($produits->description_produit); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="prixProduit">Prix</label>
                            <input id="prixProduit" class="form-control" type="text" name="price" value="<?php echo e($produits->prix); ?>" required>
                        </div>
                        
                        
                        <input class="btn btn-primary" type="submit" value="Modifier Produit">
                    </fieldset>
                    
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
            </div>
        </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/edit_produit.blade.php ENDPATH**/ ?>