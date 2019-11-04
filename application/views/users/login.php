<div class="container-fluid" style="padding-top:22px; ">
  <div class="row">
    <div class="col-12 col-sm-12 text-center">


      <div class="card text-white bg-dark mb-3" style=" max-width: 24rem; position:relative; margin:0 auto; float:none;">
        <div class="card-header">¿Tienes una Cuenta?</div>
        <div class="card-body">
          <h5 class="card-title">¡Inicia Sesión!</h5>
          <p class="card-text">Puedes consultar tus ordenes de compra</p>
          <form id="form" method="POST" action="<?php echo base_url(); ?>usuario/ingresar" name="login">
            <input type="hidden" id="registro" name="registro" value="1">
            <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
              <label class="sr-only" for="email">*E-mail</label>
              <input class="form-control" id="email" type="text" placeholder="*E-mail" name="email">
            </div>

            <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none;">
              <label class="sr-only" for="telefono">Contraseña</label>
              <input class="form-control" id="password" type="password" placeholder="*Contraseña" value="" name="password">
            </div>
            <br>
            <a class="text-white " href="#">Olvide Mi Contraseña</a>
            <br>

            <p class="text-center" style="margin-top:12px;">
              <input type="hidden" name="loggin" value="1">
              <button type="submit" class="btn btn-danger text-white">Ingresar</button>
            </p>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal de recuperacion de contraseña -->
<div class="modal fade" id="modalContraseña" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recupera tu Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ingresa tu correo:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
        </form>
        <div id="mensaje"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </div>
</div>

<?php
  if(isset($erro)){
    echo '<script> alert("'.$erro.'"); </script>';
  }
?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript">$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='login']").validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      password: {
        required: true
      }
    },
    // Specify validation error messages
    messages: {
      password: {
        required: "<span class='text-danger'>Ingrese su Contraseña</span>"
      },
      email: "<span class='text-danger'>Ingrese una cuenta de correo válida</span>"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      $("#form").submit();
    }
  });
});
