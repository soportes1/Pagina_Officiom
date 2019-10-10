    <?php $this->load->view('header');?><!-- page header -->
    <?php $this->load->view('banner');?><!-- principal banner --->

    <div class="shadows" style="
      -webkit-box-shadow: 1px -6px 50px -11px rgba(0,0,0,0.75);
      -moz-box-shadow: 1px -6px 50px -11px rgba(0,0,0,0.75);
      box-shadow: 1px -6px 50px -11px rgba(0,0,0,0.75); ">

      <div class="container" style="padding-top:12px; padding-bottom:12px; overflow-x:hidden;">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3 headband">
          <div class="flgContainer">
            <div class="flg1">
              <i class="fas fa-lock"></i>
            </div>
            <div class="flg2">
              <div class="flgTittle">Pagos Seguros</div>Efectivo,Débito,Crédito y Transferencia
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 headband">
          <div class="flgContainer">
            <div class="flg1">
              <i style="font-size:34px; position:relative; left:-5px;" class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="flg2">
              <div class="flgTittle">Pagar al recibir</div>CDMX y Área Metropolitana
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 headband">

          <div class="flgContainer">
            <div class="flg1">
              <i class="fas fa-phone-alt"></i>
            </div>
            <div class="flg2" style="line-height:20px;">
              <div class="flgTittle">Contáctanos</div>
              7258-6504 / 7258-6510<br>
              7258-65-15 / 7258-6520</div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 headband">
          <div class="flgContainer">
            <div class="flg1">
              <i class="far fa-clock"></i>
            </div>
            <div class="flg2">
              <div class="flgTittle">Horario</div>Lunes a Viernes de 9 am. a 7 pm.
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
    <br>
    <!--slider categorias -->
    <?php $this->load->view('slider-categorias'); ?>

    <br><br>
    <!-- lo + vendido -->
    <?php $this->load->view('slider-masvendido'); ?>

    <br><br>
    <!-- Nuestrtas Marcas -->
    <?php $this->load->view('slider-marcas'); ?>

    <br><br>
    <!-- ultimas promocione -->
    <?php $this->load->view('slider-promociones'); ?>


  </body>
  <!-- owl carousel-->

  <link rel="stylesheet" href="<?php echo base_url(); ?>/owl/owl.carousel.css">
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>/owl/owl.theme.default.min.css">-->
  <script src="<?php echo base_url(); ?>/owl/owl.carousel.min.js"></script>


  <?php $this->load->view('footer');?>
