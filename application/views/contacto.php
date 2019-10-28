<div class="container-fluid">
  <div class="row">

    <div class="col-12 imagen_contacto fondo-contacto">
      <h2 class="text-center sombra">Contáctanos</h2>
    </div>

  </div>
</div>


<div class="container">

  <div class="row text-center mt-3">

    <div class="col-12">

      <i class="fab fa-whatsapp" aria-hidden="true"></i> 55-7258-6504 <br>

      <i class="fas fa-phone-alt" aria-hidden="true"></i> 55-7258-6504 / 55-72586510 <br>

      <i class="fas fa-phone-alt" aria-hidden="true"></i> 55-72586515 / 55-72586520 <br>

      <i class="fas fa-envelope" aria-hidden="true"></i> info@officiumix.com <br>

      <i class="far fa-clock"></i> Lunes a Viernes 9:00 am a 6:30 pm. <br>

      <i class="fas fa-map-marker-alt"></i> Calle 19 No. 48, Ampliación Progreso Nacional, 
      07650, México, CDMX.<br>

      <button type="button" class="btn btn-danger mt-2 mb-4" data-toggle="modal" data-target="#modalmap">Mapa de Ubicación</button>

      <hr>

    </div>

  </div>





  <div class="row text-center">

    <div class="col-12 text-center mb-3">

      <h3 style="color:#1B5D90;">Déjanos un Mensaje:</h3>

    </div>

  </div>



  <form id="form1" method="POST" action="enviar_email.php">



        <div class="row">

          <div class="col-12 col-sm-6">



            <div class="form-group">

              <label class="sr-only" for="nombre">Nombre</label>

              <input class="form-control" id="nombre" type="text" placeholder="Nombre" name="nombre" onclick="javascript:this.value=''">

            </div>



            <div class="form-group">

              <label class="sr-only" for="apellidos">Apellidos</label>

              <input class="form-control" id="apellidos" type="text" placeholder="Apellidos" name="apellidos" onclick="javascript:this.value=''">

            </div>

          </div>



          <div class="col-12 col-sm-6">

            <div class="form-group">

              <label class="sr-only" for="email">E-mail</label>

              <input class="form-control" id="email" type="text" placeholder="E-mail" name="email" onclick="javascript:this.value=''">

            </div>



            <div class="form-group">

              <label class="sr-only" for="telefono">Telefono</label>

              <input class="form-control" id="telefono" type="text" placeholder="Telefono" value="Teléfono" name="telefono" onclick="javascript:this.value=''">

            </div>

          </div>



          <div class="col-12">

  	      	<div class="form-group">

  	        	<label class="sr-only" for="comentario">Mensaje</label>

  	        	<textarea class="form-control" id="comentario" placeholder="Escriba su mensaje" name="comentario" onclick="javascript:this.value=''"></textarea>

  	        </div>



          	<div class="checkbox text-center">

            	<label>

              	<input type="checkbox" name="terminos" id="terminos"> Acepto aviso de privacidad.

              </label>

              <label><a href="/officium/web/tienda/aviso" target="_blank"><span class="glyphicon glyphicon-asterisk"></span> Leer aviso de privacidad.</a></label>

          	</div>

  					<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" value="03AOLTBLS-AyO2wDMBxyqFW0CQF4_xMvLUYNLq1CTQD92oQJG0uQMvNi8P4BX3AKvIFzHbmAkkY9n8pDAQWB3pRdhuLujAuM7e2_jEi3y8m7MXkEfnkW8AmIBrrWbC8eOC9gEaMgSqBhLjr12n5zHGn_qjTvPas54dv7X3oaQpH64MJR3BvXwn2Ywtwt_2GUiMjk4M-4TumkmXhktMYoKamA3psbzIbTLEf6sT7m8a20Ao-lSbRsAeDEegAeSYetuWHFI6fit2hxLrgWu7qQxR4dzb1BqVepjWmEv1vRtGYYoxmYabJnfxiK33N_lzm9sVPZOm4QT8fCZCfbKYfxHM1p40t51sZ_Xk0QPzlm73iAytLqBpfEH_MIP9fHrqyblb1ujikAx_Bnb9q3uD22BTcFf-OTS196zUar-KS5Ui_TQAdUk6Tb7Xf-BBmohbuZFhTvsbqPVK1TTGYUSe5KBT3XMAEWxRrtuGN483x2mIZIEG3zDwyccXPBEWJHpmA4a-obgDpepu_lkm">

          	<!--<a class="btn btn-danger text-white" onclick="javascript:EnviarEmail()" id="addLead">Enviar</a>-->

  					<span id="cload"></span><br>

            <center>

    					<button type="button" onclick="alert('Mensaje enviado. Te contactarémos a la mayor brevedad.')" class="btn btn-danger text-white" id="addLead">Enviar

    	        <div class="txt-blanco" id="Ajax"></div>

            </center>

           </button></div>

          </div>

      </form>
</div>



<!-- Modal -->
<div class="modal fade" id="modalmap" tabindex="-1" role="dialog" aria-labelledby="modalmapLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mapa de Localización:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15042.315434905813!2d-99.157572!3d19.5167466!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x38da6c8282292a05!2sGASTELUM%20IX!5e0!3m2!1ses-419!2smx!4v1572018134319!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <br> Calle 19 No. 48, Ampliación Progreso Nacional,07650 Ciudad de México, CDMX
      </div>

    </div>
  </div>
</div>
