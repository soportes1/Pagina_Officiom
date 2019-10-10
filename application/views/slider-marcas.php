<div class="container-fluid" style="padding-top:18px;">
  <div class="row">
    <div class="col-12 col-md-6 m1" style="padding-left:85px;">
      <div style="position:relative; float:left">
        <span class="st3" style="color:#A09FA4; font-size:36px;"><i class="far fa-hand-point-right"></i></span>
      </div>
      <div style="position:relative; float:left">
        <span class="st1" style="position: relative;font-weight:500; color:#A09FA4; font-size:40px; line-height:8px;. display:inline-block;">Nuestras</span>
        <span class="st2" style="position: relative; color:#1B5D90; font-weight:bold; font-size:40px; display:inline;">Marcas</span>
      </div>
    </div>
    <!-- responsive tittle-->
    <div class="col-12  m2">
      <div class="tittleContainer">
        <span class="st3" style="color:#A09FA4; font-size:36px;"><i class="far fa-hand-point-right"></i></span>
        <span class="st1" style="position: relative;font-weight:500; color:#A09FA4; font-size:40px; line-height:8px;. display:inline-block;">Nuestras</span>
        <span class="st2" style="position: relative; color:#1B5D90; font-weight:bold; font-size:40px; display:inline;">Marcas</span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-1"></div>
    <div class="col-10" style="min-height:1px; max-height: 1px;background-color:#ccc;"></div>
  </div>

  <div class="row" style="margin-top:45px;">
    <div class="col-12">
      <button class="btn btn-sliderleft slider-buttonleft3"></button>
      <button class="btn btn-sliderright slider-buttonright3"></button>

      <div class="owl-carousel owl-marcas" style="width:85% !important; position:relative; margin:0 auto;">
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/1.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/2.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/3.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/4.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/5.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/6.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/7.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/8.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/9.jpg" class="img-fluid" style="width:160px;">
        </div>
        <div style="   width:200px;" class="marca-container">
          <img src="<?php echo base_url();?>/img/marcas/10.jpg" class="img-fluid" style="width:160px;">
        </div>

      </div>

      <script type="text/javascript">
        $(document).ready(function(){

          $('.owl-marcas').owlCarousel({
              loop:true,
              /*stagePadding:10,*/
              margin:10,
              responsiveClass:true,
              autoplay:true,
              nav: false,
              responsive:{
                  0:{
                    items:1,
                    stagePadding:50,
                    margin:180,
                    center:true,
                    nav:false
                  },
                  600:{
                      items:3,
                      nav:false
                  },
                  1000:{
                      items:6,
                      nav:false,
                  }
              }
          });

          $(".slider-buttonleft3").click(function(){
            $('.owl-marcas').trigger('prev.owl.carousel');
          });
          $(".slider-buttonright3").click(function(){
            $('.owl-marcas').trigger('next.owl.carousel');
          });

        });
      </script>


    </div>

  </div>
</div>
