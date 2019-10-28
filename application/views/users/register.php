<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 text-center">

      <form id="form1" method="POST" action="">
        <input type="hidden" name="registro" value="1">
        <h4 class="color2">Ingresa tus datos para crear una cuenta </h4>
          <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
            <label class="sr-only" for="nombre">*Nombre</label>
            <input class="form-control" id="nombre" type="text" placeholder="*Nombre" value="" name="nombre" onclick="javascript:this.value=''">
          </div>

          <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
            <label class="sr-only" for="apellidos">Apellidos</label>
            <input class="form-control" id="apellidos" type="text" placeholder="*Apellidos" value="" name="apellidos" onclick="javascript:this.value=''">
          </div>

          <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
            <label class="sr-only" for="email">*E-mail</label>
            <input class="form-control" id="email1" type="text" placeholder="*E-mail" value="" name="email1" onclick="javascript:this.value=''">
          </div>

          <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
            <label class="sr-only" for="password">*Contraseña</label>
            <input class="form-control" id="passworda" type="password" placeholder="*Contraseña" value="" name="passworda">
          </div>

          <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
            <label class="sr-only" for="password">*Verificar Contraseña</label>
            <input class="form-control" id="passwordb" type="password" placeholder="*Verificar Contraseña" value="" name="passwordb">
          </div>

          <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
            <label class="sr-only" for="telefono">*Telefono</label>
            <input class="form-control" id="telefono" type="text" placeholder="*Telefono" value="" name="telefono">
          </div>

          <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
            <textarea class="form-control" name="direccion" id="direccion" placeholder="Ingresar Dirección"></textarea>
          </div>

          <div class="checkbox">
            <label>
              <input type="checkbox" name="terminos" id="terminos"> Acepto
              <a href="politicas-privacidad.html" target="_blank">
                aviso de privacidad
              </a> y
              <a href="politicas-compra.php" target="_blank">
                politicas de compra
              </a>
            </label>
          </div>

          <p class="text-center">
            <input type="button" onclick="newUser();" name="registrarme" value="Registrarme" class="btn btn-danger text-white">
          </p>
        </form>


    </div>
  </div>
</div>
