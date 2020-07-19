

<?php $__env->startSection('content'); ?>


      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-5 mb-4 mb-xl-0">
                  <h3 class="font-weight-normal mb-0 color-light-pink mt-2">Bienvenue SushiM.</h3>
                </div>
              </div>
            </div>
          </div>
       
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card bg-primary border-0 position-relative">
                <div class="card-body">
                  <p class="card-title">Tableau de Bord</p>
                  
                  <ul><h4 >Ici, dans l'onglet <span class="color-light-pink font-weight-bold">"Création"</span>, vous pouvez enregistrer:</h4>
                    
                    <li>De nouveaux produits.</li>
                    <li>De nouvelles photos de couverture pour vos pages.</li>
                    <li>De nouveaux allergenes pour chacun de vos produits.</li>
                    
                  </ul>
                  <ul><h4>Ici, dans l'onglet <span class="color-light-pink font-weight-bold">"Modifier/Supprimer"</span>, vous pouvez:</h4>
                    <li>Afficher vos Catégories de produits.</li>
                    <li>Rendre visible ou cacher vos produits sur votre site.</li>
                    <li>Rendre visible ou cacher photos de couverture sur votre site.</li>
                    <li>Modifier/Supprimer vos produits.</li>
                    <li>Modifier/Supprimer vos photos et intitulés de couverture pour vos pages.</li>
                    <li>Modifier/Supprimer les allergènes pour chacun de vos produits.</li>
                  </ul>
                  <ul><h4>Ici, dans l'onglet <span class="color-light-pink font-weight-bold">"Rôle des utilisateurs"</span>, vous pouvez:</h4>
                    
                    <li>Créer un rôle en lui attribuant des accès spécifiques.</li>
                    <li>Consulter les rôles déjà crées et leurs accès.</li>
                    <li>Modifier les rôles déjà crées et leurs accès.</li>
                    <li>Supprimer les rôles déjà crées et leurs accès.</li>
                    
                  </ul>
                  <ul><h4>Ici, dans l'onglet <span class="color-light-pink font-weight-bold">"Utilisateurs"</span>, vous pouvez:</h4>
                    <li>Créer un utilisateur.</li>
                    <li>Consulter chacun des utilisateurs et son rôle qui lui a été attribué. </li>
                    <li>Modifier un utilisateur: son nom, son mot de passe, son email et son rôle. </li>
                    <li>Supprimer un utilisateur</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
       
        <!-- content-wrapper ends -->
      
    <!-- page-body-wrapper ends -->
  
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/admin/tableau_de_bord.blade.php ENDPATH**/ ?>