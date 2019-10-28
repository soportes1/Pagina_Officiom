<div class="container-fluid" style="background-color:#F5F5F5; padding-top:22px;
  alistasweb
">
  <div class="row">
    <div class="col-12 col-sm-12 text-center">


      <div class="card text-white bg-primary mb-3" style=" max-width: 24rem; position:relative; margin:0 auto; float:none;">
        <div class="card-header">¿Tienes una Cuenta?</div>
        <div class="card-body">
          <h5 class="card-title">¡Inicia Sesión!</h5>
          <p class="card-text">Puedes consultar tus ordenes de compra!</p>
          <form id="form12" method="POST" action="" >

              <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                <label class="sr-only" for="email">*E-mail</label>
                <input class="form-control" id="email" type="text" placeholder="*E-mail" name="email">
              </div>

              <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none;">
                <label class="sr-only" for="telefono">Contraseña</label>
                <input class="form-control" id="passwordc" type="password" placeholder="*Contraseña" value="" name="passwordc">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
