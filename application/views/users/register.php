<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 text-center">

      <div class="card text-white bg-dark mb-3" style=" max-width: 50em;position:relative; margin:0 auto; float:none;">
        <div class="card-header">Nuevo Registro</div>

        <div class="card-body">
          <h5 class="card-title">Ingresa tus datos para crear una cuenta:</h5>

          <form id="form" method="POST" action="<?php echo base_url(); ?>usuario/agregar_usuario" name="registration">
            <input type="hidden" name="registro" value="1">
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group" style=" position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                  <label class="sr-only" for="nombre">*Nombre</label>
                  <input class="form-control" id="nombre" type="text" placeholder="*Nombre" value="" name="nombre" onclick="javascript:this.value=''">
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group" style=" position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                  <label class="sr-only" for="apellidos">Apellidos</label>
                  <input class="form-control" id="apellidos" type="text" placeholder="*Apellidos" value="" name="apellidos" onclick="javascript:this.value=''">
                </div>
              </div>


              <div class="col-12 col-sm-6">
                <div class="form-group" style=" position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                  <label class="sr-only" for="telefono">*Telefono</label>
                  <input class="form-control" id="telefono" type="text" placeholder="*Telefono" value="" name="telefono">
                </div>
              </div>

              <div class="col-12 col-sm-6">
                <div class="form-group" style=" position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                  <label class="sr-only" for="email">*E-mail</label>
                  <input class="form-control" id="email" type="text" placeholder="*E-mail" value="" name="email" onclick="javascript:this.value=''">
                </div>
              </div>

              <div class="col-12 col-sm-6">
                <div class="form-group" style=" position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                  <label class="sr-only" for="password">*Contraseña</label>
                  <input class="form-control" id="password" type="password" placeholder="*Contraseña" value="" name="password">
                </div>
              </div>

              <div class="col-12 col-sm-6">
                <div class="form-group" style=" position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                  <label class="sr-only" for="passwor2">*Verificar Contraseña</label>
                  <input class="form-control" id="password2" type="password" placeholder="*Verificar Contraseña" value="" name="password2">
                </div>
              </div>



              <div class="col-12">
                <div class="form-group" style=" position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                  <textarea class="form-control" name="direccion" id="direccion" placeholder="Ingresar Dirección"></textarea>
                </div>
              </div>
            </div>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1" style="cursor:pointer;">
              <label class="custom-control-label" for="customCheck1">
                Acepto
                <a href="politicas-privacidad.html" target="_blank">
                 aviso de privacidad
                </a> y
                <a href="politicas-compra.php" target="_blank">
                 politicas de compra
                </a>
              </label>
            </div>
            <br>

              <p class="text-center">
                <input type="submit"  name="registrarme" value="Registrarme" class="btn btn-danger text-white">
              </p>
            </form>
        </div>

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
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      nombre: "required",
      apellidos: "required",
      telefono: "required",
      direccion: "required",
      customCheck1 : "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5,
      },
      password2: {
        equalTo: "#password"
      }
    },
    // Specify validation error messages
    messages: {
      nombre: "<span class='text-danger'>Ingrese Su Nombre</span>",
      apellidos: "<span class='text-danger'>Ingrese su apellido</span>",
      telefono: "<span class='text-danger'>Ingrese su teléfono de contacto</span>",
      password: {
        required: "<span class='text-danger'>Ingrese una contraseña válida</span>",
        minlength: "<span class='text-danger'>La contraseña debe tener mínimo 5 caracteres</span>",
      },
      email: "<span class='text-danger'>Ingrese una cuenta de correo válida</span>",
      direccion: "<span class='text-danger'>Ingrese los datos de entrega</span>",
      password2: "<span class='text-danger'>Las contraseñas deben coincidir</span>",
      customCheck1: "<br> <span class='text-danger'><center style='position:absolute;'>Acepte términos y condiciones para continuar</center></span>"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      $("#form").submit();
    }
  });
});

</script>
