
<?php $__env->startSection('title'); ?>
    Nous Contacter
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
        $sliders=DB::table('sliders')
            ->where('status',1)
            ->first();
       

        
       
    ?>

<div class="hero-wrap hero-bread" style="background-image: url('storage/slider_images/<?php echo e($sliders->slider_image); ?>');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-0 bread">Nous Contacter</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">
      <div class="row d-flex mb-5 contact-info">
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Address:</span> 78 rue Calixte Camelle, 33110 Le B.</p>
          </div>
      </div>
      <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <a href="tel:0556291152"><span class="text">05 56 29 11 52</span></a>
          </div>
      </div>
      <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Email:</span> <a href="mailto:info@sushim.com">info@msushi.com</a></p>
          </div>
      </div>
      <div class="col-md-3 d-flex">
          <div class="info bg-white p-4">
            <p><span>Site Web</span> <a href="#">msushi.com</a></p>
          </div>
      </div>
    </div>
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">

      <form action="<?php echo e(route('contact_path')); ?>" class="bg-white p-5 contact-form" method="POST" novalidate>
        <?php echo e(csrf_field()); ?>

      <div class="form-group <?php echo e($errors->has('nom')? 'has-error': ''); ?>">
        <label for="nom" class="control-label">Votre Nom</label>
        <input id="nom" name="nom" type="text"  class="form-control" placeholder="Votre Nom" required value="<?php echo e(old('nom')); ?>">
            <?php echo $errors->first('nom', '<span class="help-block">:message</span>'); ?>

      </div>
      <div class="form-group <?php echo e($errors->has('nom')? 'has-error': ''); ?>">
        <label for="prenom" class="control-label">Votre Prénom</label>
        <input id="prenom" name="prenom" type="text"  class="form-control" placeholder="Votre Prénom" required value="<?php echo e(old('prenom')); ?>">
            <?php echo $errors->first('nom', '<span class="help-block">:message</span>'); ?>

      </div>
      <div class="form-group <?php echo e($errors->has('email')? 'has-error': ''); ?>">
            <label for="email" class="control-label">Votre Email</label>
            <input id="email" name="email" type="text" class="form-control" placeholder="Votre Email" required value="<?php echo e(old('email')); ?>">
            <?php echo $errors->first('email', '<span class="help-block">:message</span>'); ?>

          </div>
          <div class="form-group <?php echo e($errors->has('messageSubject')? 'has-error': ''); ?>">
            <label for="messageSubject" class="control-label">Sujet</label>
            <input id="messageSubject" name="messageSubject" type="text" class="form-control" placeholder="votre sujet" required value="<?php echo e(old('messageSubject')); ?>">
            <?php echo $errors->first('messageSubject', '<span class="help-block">:message</span>'); ?>

           
          </div>
          <div class="form-group <?php echo e($errors->has('textMessage')? 'has-error': ''); ?>">
            <label for="textMessage" class="control-label">Message</label>
            <textarea id="textMessage" name="textMessage" cols="30" rows="7" class="form-control" placeholder="Message"><?php echo e(old('textMessage')); ?></textarea>
            <?php echo $errors->first('textMessage', '<span class="help-block">:message</span>'); ?>

            
          </div>

          <div class="form-group checkbox <?php echo e($errors->has('consent')? 'has-error': ''); ?>">  
            <label for="rgpd">
              <input type="checkbox" id="rgpd" name="consent" value="on" required>
                <?php echo e($consentMessage); ?>

            </label>
            <?php echo $errors->first('consent', '<span class="help-block">Veuillez accepter les conditions ci-dessus pour valider le formulaire. </span>'); ?>

          </div>

          <div class="form-group ">
            <input type="submit" value="Envoyer Message" class="btn btn-primary py-3 px-5" >
          </div>
        </form>
      
      </div>

      <div class="col-md-6 d-flex">
          <div id="map" class="bg-white">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.923949830238!2d-0.5839323842444804!3d44.86384298132108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd55286b4458b851%3A0x70ab616a27dfb872!2s78%20Rue%20Calixte%20Camelle%2C%2033110%20Le%20Bouscat!5e0!3m2!1sfr!2sfr!4v1590594290924!5m2!1sfr!2sfr" 
              width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
      </div>
    </div>
  </div>
</section>
    
	<?php $__env->stopSection(); ?>


    
  
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\sushiman\sushiman\resources\views/client/contact.blade.php ENDPATH**/ ?>