<?php 

    wp_register_script('g-recaptcha', 'https://www.google.com/recaptcha/api.js', '', false, true );
    wp_enqueue_script('g-recaptcha');

    wp_register_script('contact-form', get_template_directory_uri() .  '/js/contact-form.js', '', false, true );
    wp_enqueue_script('contact-form');
    

?>


<form id="contact-form">
  <div class="row">
    <div class="col-12 col-sm-4">
      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="cf_input" name="nombre" id="nombre" aria-describedby="nombre" placeholder="ej: Carlos" required>
      </div>
    </div>
    <div class="col-12 col-sm-4">
      <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" class="cf_input" name="apellido" id="apellido" aria-describedby="apellido" placeholder="ej: Ruíz" required>
      </div>
    </div>
    <div class="col-12 col-sm-4">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="cf_input" name="email" id="email" placeholder="ej. carlos@email.com" required>
      </div>
    </div>
    <div class="col-12 col-sm-6">
      <div class="form-group">
        <label for="pais">País</label>
        <input type="text" class="cf_input" name="pais" id="pais" placeholder="ej. Quintana Roo" required>
      </div>
    </div>
    <div class="col-12 col-sm-6">
      <div class="form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="cf_input" name="ciudad" id="ciudad" placeholder="ej. Playa del Carmen" required>
      </div>
    </div>
    <div class="col-12 col-sm-12">
      <div class="form-group">
        <label for="asunto">Asunto</label>
        <input type="text" class="cf_input" name="asunto" id="asunto" aria-describedby="asunto" placeholder="Asunto" required>
      </div>
    </div>
    <div class="col-12 col-sm-12">
      <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <textarea class="cf_textarea" name="mensaje" id="mensaje" rows="3" required></textarea>
      </div>
    </div>
    <div class="col-12 col-sm-12">
      <div class="form-group cf_captcha text-center">
          <div class="g-recaptcha" data-sitekey="6LfAkv8UAAAAAHJbEuvQNIlO2FO-Dd59iCowrEcm"></div>
      </div>
    </div>
    <div class="col-12 col-sm-12 text-center">
        <button type="submit" class="btn cf_btn">Enviar</button>
    </div>
  </div>
</form>
