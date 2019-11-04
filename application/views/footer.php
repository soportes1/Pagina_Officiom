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
              <li>
                <a class="text-reset" href="<?php echo base_url();?>tienda/vista/quienes_somos">
                  <i class="fas fa-angle-right"></i> ¿Quiénes Somos?
                </a>
              </li>
              <li>
                <a class="text-reset" href="<?php echo base_url();?>tienda/vista/aviso_privacidad"><i class="fas fa-angle-right"></i> Aviso de Privacidad</a>
              </li>
              <li>
                <a class="text-reset" href="<?php echo base_url();?>tienda/vista/terminos_condiciones"><i class="fas fa-angle-right"></i> Términos y Condiciones</a>
              </li>
              <li><a class="text-reset" href="<?php echo base_url();?>tienda/vista/politicas_envio"><i class="fas fa-angle-right"></i> Políticas de Envío</a>
              </li>
            </ul>
          </div>

          <div class="col-12 col-md-3 foot" >
            <ul>
              <li class="ptittle">CONTÁCTANOS</li>
              <a href="/officium/web/tienda/contacto" class="text-reset">
                <li><i class="fab fa-whatsapp"></i> 55-7258-6504</li>
                <li><i class="fas fa-phone-alt"></i> 55-7258-6504 / 55-7258-6510</li>
                <li><i class="fas fa-phone-alt"></i> 55-7258-6515 / 55-7258-6520</li>
                <li><i class="fas fa-envelope"></i> info@officiumix.com</li>
              </a>
            </ul>
          </div>

          <div class="col-12 col-md-2 foot" >
            <ul>
              <li class="ptittle">SÍGUENOS EN</li>
              <li><i class="fab fa-facebook"></i> Facebook</li>
            </ul>
          </div>

          <div class="col-12 col-md-5 foot" style="font-size:13px;">
            <ul>
              <li><i class="far fa-registered"></i> Officium - Artículos de Oficina y Papelería. Todos los Derechos Reservador 2019.<br><i class="fas fa-map-marker-alt"></i> Calle 19 No. 48, Ampliación Progreso Nacional, 07650, México, CDMX.</li>
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
      <div class="modal bd-example-modal-lg fade" id="exampleModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document"><div class="modal-content">
          <div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Carrito de Compras</<h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row text-center" style="margin-bottom:12px;">
                <div class="col-9 text-left">
                  <b>Producto</b>
                </div>
                <div class="col-3 text-center">
                  <b>Cantidad</b>
                </div>
              </div>
              <div class="row text-center" id="ecarList">
                <div class="col-3"></div>
                <div class="col-7"></div>
                <div class="col-2"></div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  data-dismiss="modal">
              Seguir comprando <i class="fas fa-shopping-basket"></i>
            </button>
            <a href="http://especialistaswebdemos.com.mx/officium/web/ecar/ecarResume" class="btn btn-danger ">
              Finalizar Compra <i class="fas fa-hand-holding-usd"></i>
            </a>
          </div>
        </div>
        </div>
      </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  </body>
</html>
