
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(URL::to('/admin')); ?>">
            
            <span class="menu-title menu-text">Accueil</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-linked" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="fas fa-caret-down mr-3 fa-2x"></i>
            <span class="menu-title color-dark-pink menu-text ">Création</span>
           
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Produit-créer')): ?>
                <li class="nav-item"><a class="nav-link nav-item-linked" href="<?php echo e(URL::to('/admin/ajouterproduit')); ?>">Ajouter produit</a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider-créer')): ?>
                <li class="nav-item"><a class="nav-link nav-item-linked" href="<?php echo e(URL::to('/admin/ajouterslider')); ?>">Ajouter photo de couverture</a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Allergène-créer')): ?>
                <li class="nav-item"><a class="nav-link nav-item-linked" href="<?php echo e(URL::to('/admin/ajouterallergene')); ?>">Ajouter allergène</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-linked" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="fas fa-caret-down mr-3 fa-2x"></i>
            <span class="menu-title color-dark-pink menu-text ">Afficher/Modifier</span>
            
          </a>
          <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Catégorie-liste')): ?>
                <li class="nav-item"> <a class="nav-link nav-item-linked" href="<?php echo e(URL::to('/admin/categories')); ?>">Catégories</a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Produit-liste')): ?>
                <li class="nav-item"> <a class="nav-link nav-item-linked" href="<?php echo e(URL::to('/admin/produits')); ?>">Produits</a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Slider-liste')): ?>
                <li class="nav-item"> <a class="nav-link nav-item-linked" href="<?php echo e(URL::to('/admin/sliders')); ?>">Photos de couverture</a></li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Allergène-liste')): ?>
                <li class="nav-item"> <a class="nav-link nav-item-linked" href="<?php echo e(URL::to('/admin/allergenes')); ?>">Allergènes</a></li>
              <?php endif; ?>
              <li class="nav-item"> <a class="nav-link nav-item-linked" href="<?php echo e(URL::to('/admin/commandes')); ?>">Commandes</a></li>
            </ul>
          </div>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Rôle-liste')): ?>
          <li class="nav-item nav-linked">
            <a class="nav-link" href="<?php echo e(URL::to('/admin/roles')); ?>" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-caret-down mr-3 fa-2x"></i>
              <span class="menu-title color-dark-pink menu-text ">Rôles des utilisateurs</span>
              
            </a>
            
          </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Utilisateurs-liste')): ?>
          <li class="nav-item nav-linked">
            <a class="nav-link" href="<?php echo e(URL::to('/admin/utilisateurs')); ?>" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-caret-down mr-3 fa-2x"></i>
              <span class="menu-title color-dark-pink menu-text ">Utilisateurs</span>
              
            </a>
            
          </li>
        <?php endif; ?>
      </ul>
    </nav>
    <!-- partial --><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/partials/nav2.blade.php ENDPATH**/ ?>