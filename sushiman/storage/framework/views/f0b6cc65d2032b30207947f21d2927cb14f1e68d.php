<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tableau de bord | M.Sushi</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/css/themify-icons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('backend/css/vendor.bundle.base.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('backend/css/vendor.bundle.addons.css')); ?>">
  <!-- endinject -->
  
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/d70b24b0b8.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container-scroller">
    <?php echo $__env->make('partials.nav1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid page-body-wrapper">
        <?php echo $__env->make('partials.nav2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- content-wrapper ends -->
</div>





    <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo e(asset('backend/js/vendor.bundle.base.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/js/vendor.bundle.addons.js')); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo e(asset('backend/js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/js/template.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/js/settings.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/js/todolist.js')); ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('backend/js/dashboard.js')); ?>"></script>
  <!-- End custom js for this page-->
  <!-- Custom js for this page-->
  <script src="<?php echo e(asset('backend/js/dashboard.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/js/form-validation.js')); ?>"></script>

  <script src="<?php echo e(asset('backend/js/bt-maxLength.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/js/bootbox.min.js')); ?>"></script>
  <!-- End custom js for this page-->


  <script> 
    $(document).on("click","#delete", function(e){
      e.preventDefault();
      var link =$(this).attr("href");
      bootbox.confirm("Voulez-vous le supprimer définitement ?", function(confirmed){
        if(confirmed){
          window.location.href = link;
        };
      });
    });
  
  </script>
</body>

</html><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/layouts/appadmin.blade.php ENDPATH**/ ?>