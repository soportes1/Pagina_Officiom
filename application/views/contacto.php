<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h2>CONTÁCTANOS</h2>
      <hr>
      <br>
    </div>

  </div>

  <div class="row text-center">
    <div class="col-12">
      <h3 style="color:#1B5D90;">OfficiumIX</h3>
      <i class="fab fa-whatsapp" aria-hidden="true"></i> 7258-6504 <br>
      <i class="fas fa-phone-alt" aria-hidden="true"></i> 72586504 / 72586510 <br>
      <i class="fas fa-phone-alt" aria-hidden="true"></i> 72586515 / 72586520 <br>
      <i class="fas fa-envelope" aria-hidden="true"></i> info@officiumix.com <br>
      <i class="far fa-clock"></i> Lunes a Viernes 9 am a 6 pm. <br>
      <i class="fas fa-map-marker-alt"></i> Calle 19 No. 48, Ampliación Progreso Nacional, <br>
      07650 Ciudad de México, CDMX <br>
      <button type="button" class="btn btn-danger mt-2 mb-4" onclick="loadMap('narvarte');">Mapa de Ubicación</button>
      <hr>
      <br>
    </div>
  </div>


  <div class="row text-center">
    <div class="col-12 text-center">
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
              <label><a href="politicas-privacidad.html" target="_blank"><span class="glyphicon glyphicon-asterisk"></span> Leer aviso de privacidad.</a></label>
          	</div>
  					<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" value="03AOLTBLS-AyO2wDMBxyqFW0CQF4_xMvLUYNLq1CTQD92oQJG0uQMvNi8P4BX3AKvIFzHbmAkkY9n8pDAQWB3pRdhuLujAuM7e2_jEi3y8m7MXkEfnkW8AmIBrrWbC8eOC9gEaMgSqBhLjr12n5zHGn_qjTvPas54dv7X3oaQpH64MJR3BvXwn2Ywtwt_2GUiMjk4M-4TumkmXhktMYoKamA3psbzIbTLEf6sT7m8a20Ao-lSbRsAeDEegAeSYetuWHFI6fit2hxLrgWu7qQxR4dzb1BqVepjWmEv1vRtGYYoxmYabJnfxiK33N_lzm9sVPZOm4QT8fCZCfbKYfxHM1p40t51sZ_Xk0QPzlm73iAytLqBpfEH_MIP9fHrqyblb1ujikAx_Bnb9q3uD22BTcFf-OTS196zUar-KS5Ui_TQAdUk6Tb7Xf-BBmohbuZFhTvsbqPVK1TTGYUSe5KBT3XMAEWxRrtuGN483x2mIZIEG3zDwyccXPBEWJHpmA4a-obgDpepu_lkm">
          	<!--<a class="btn btn-danger text-white" onclick="javascript:EnviarEmail()" id="addLead">Enviar</a>-->
  					<span id="cload"></span><br>
            <center>
    					<button type="button" onclick="EnviarEmail();" class="btn btn-danger text-white" id="addLead">Enviar
    	        <div class="txt-blanco" id="Ajax"></div>
            </center>
           </button></div>
          </div>
      </form>


</div>
