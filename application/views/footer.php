    <!-- Info Contact-->
    <div class="container-fluid ft" style="margin-top:50px;">
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10" style="min-height:1px; max-height: 1px;background-color:#ccc;"></div>
      </div>
    </div>

    <div class="container pre-footer">
      <div class="row">
        <div class="col-12 col-md-2 foot" >
          <ul>
            <li class="ptittle">INFORMACIÓN</li>
            <li><a class="text-reset" href="<?php echo base_url();?>tienda/vista/quienes_somos">¿Quiénes Somos?</a></li>
            <li><a class="text-reset" href="<?php echo base_url();?>tienda/vista/aviso_privacidad">Aviso de Privacidad</a></li>
            <li><a class="text-reset" href="<?php echo base_url();?>tienda/vista/terminos_condiciones">Términos y Condiciones</a></li>
            <li><a class="text-reset" href="<?php echo base_url();?>tienda/vista/politicas_envio">Políticas de Envío</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-2 foot" >
          <ul>
            <li class="ptittle">CONTÁCTANOS</li>
            <li><a class="text-reset" href="<?php echo base_url();?>tienda/vista/contacto"><i class="fas fa-file-signature"></i> Contacto</a></li>
            <li><i class="fas fa-phone-alt"></i> 72586504 / 72586510</li>
            <li><i class="fas fa-phone-alt"></i> 72586515 / 72586520</li>
            <li><i class="fas fa-envelope"></i> info@officiumix.com</li>
          </ul>
        </div>
        <div class="col-12 col-md-2 foot" >
          <ul>
            <li class="ptittle">SÍGUENOS EN</li>
            <li><i class="fab fa-facebook"></i> Facebook</li>
            <li><i class="fab fa-whatsapp"></i> 7258-6504</li>
          </ul>
        </div>
          <div class="col-12 col-md-6 foot" style="font-size:13px;">
            <ul>
              <li>
              <i class="far fa-registered"></i> Officium - Artículos de Oficina y Papelería. Todos los Derechos Reservador 2019.<br>
              Calle 19 No. 48, Ampliación Progreso Nacional, 07650 Ciudad de México, CDMX.</li>
            </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid" style="background-color:#E0E0E1; min-height:68px; padding:3px; padding-top:12px; margin:0; ">
      <div class="col-12">
        <p class="text-center">
          <i class="fas fa-lock ft" style="color:#A09FA4; font-size:32px; top:12px;"></i>
          <img src="<?php echo base_url();?>/img/footer.png" class="img-fluid" style="width:918px; position: relative; margin-top:4px;">
        </p>
      </div>
    </div>

    <!--Modal del carrito de compras -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Carrito de Compras</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary">Seguir comprando <i class="fas fa-shopping-basket"></i></button>
            <button type="button" class="btn btn-danger " data-dismiss="modal">Finalizar Compra <i class="fas fa-hand-holding-usd"></i></button>
          </div>
        </div>
      </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  </body>
</html>
