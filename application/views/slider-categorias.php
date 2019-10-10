
<div class="container-fluid" style="padding-top:8px;">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-3 col-lg-3 m1" style="padding-top:28px;">
      <div style="position:relative; float:right">
        <div class="st1" style="position: relative;font-weight:500; color:#A09FA4; font-size:40px; line-height:8px">Todas las</div>
        <div class="st2" style="position: relative; color:#1B5D90; font-weight:bold; font-size:40px; ">Categorías</div>
      </div>
      <div style="position:relative; float:right">
        <span class="st3" style="color:#A09FA4; font-size:36px;"><i class="far fa-hand-point-right"></i></span>
      </div>
    </div>

    <div class="col-12 m2" style="padding-top:28px;">
      <div class="tittleContainer">
          <span class="st3" style="color:#A09FA4; top:22px; font-size:36px;"><i class="far fa-hand-point-right"></i></span>
          <span class="st1" style="position: relative;font-weight:500; color:#A09FA4; font-size:40px; line-height:8px">Todas las</span>
          <span class="st2" style="position: relative; color:#1B5D90; font-weight:bold; font-size:40px; ">Categorías</span>
      </div>
    </div>



      <div class="col-1 m2"></div>
      <div class="col-10 m2" style=" min-height:1px; max-height: 1px;background-color:#ccc; margin-bottom:35px;"></div>


    <div class="col-12 col-md-9">
      <!--Carrusel  -->
      <!-- Set up your HTML -->
      <button class="btn btn-sliderleft slider-buttonleft "></button>
      <button class="btn btn-sliderright slider-buttonright"></button>

      <div class="owl-carousel owl-categorias" style="width:80% !important; position:relative; margin:0 auto;">
        <div class="categorias-child" >
          <img src="<?php echo base_url(); ?>/img/categorias/1.png">
          <span style="color:#A09FA4; font-weight:bold;">Escolares y Oficina</span>
        </div>

        <div class="categorias-child">
          <img src="<?php echo base_url(); ?>/img/categorias/2.png">
          <span style="color:#A09FA4; font-weight:bold;">Papel</span>
        </div>

        <div class="categorias-child">
          <img src="<?php echo base_url(); ?>/img/categorias/3.png">
          <span style="color:#A09FA4; font-weight:bold;">Tintas y Toners</span>
        </div>

        <div class="categorias-child">
          <img src="<?php echo base_url(); ?>/img/categorias/4.png">
          <span style="color:#A09FA4; font-weight:bold;">Tecnología</span>
        </div>

        <div class="categorias-child">
          <img src="<?php echo base_url(); ?>/img/categorias/5.png">
          <span style="color:#A09FA4; font-weight:bold;">Accesorios</span>
        </div>

        <div class="categorias-child">
          <img src="<?php echo base_url(); ?>/img/categorias/6.png">
          <span style="color:#A09FA4; font-weight:bold;">Muebles</span>
        </div>

        <div class="categorias-child">
          <img src="<?php echo base_url(); ?>/img/categorias/7.png">
          <span style="color:#A09FA4; font-weight:bold;">Tlapalería</span>
        </div>

        <div class="categorias-child">
          <img src="<?php echo base_url(); ?>/img/categorias/8.png">
          <span style="color:#A09FA4; font-weight:bold;">Limpieza</span>
        </div>

        <div class="categorias-child">
          <img src="<?php echo base_url(); ?>/img/categorias/9.png">
          <span style="color:#A09FA4; font-weight:bold;">Cafetería</span>
        </div>


      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          var owlcat =  $('.owl-categorias');
          owlcat.owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            autoplay:true,
            nav: false,
            responsive:{
                  0:{
                    center:true,
                    items:1,
                    nav:false
                  },
                  600:{
                      items:3,
                      nav:false
                  },
                  1000:{
                      items:5,
                      nav:false,
                  }
              }
          }
          );
          // Custom Navigation Events
          $(".slider-buttonleft").click(function(){
            owlcat.trigger('prev.owl.carousel');
          });
          $(".slider-buttonright").click(function(){
            owlcat.trigger('next.owl.carousel');
          });
        });
      </script>
    </div>
  </div>
</div>
