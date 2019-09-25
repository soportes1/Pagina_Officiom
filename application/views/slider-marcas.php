<div class="container-fluid" style="padding-top:18px;">
  <div class="row">
    <div class="col-12 col-md-4" style="padding-right:40px;">
      <div style="position:relative; float:right">
        <span class="st1" style="position: relative;font-weight:500; color:#A09FA4; font-size:40px; line-height:8px;. display:inline-block;">Nuestras</span>
        <span class="st2" style="position: relative; color:#1B5D90; font-weight:bold; font-size:40px; display:inline;">Marcas</span>
      </div>
      <div style="position:relative; float:right">
        <span class="st3" style="color:#A09FA4; font-size:36px;"><i class="far fa-hand-point-right"></i></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10" style="min-height:1px; max-height: 1px;background-color:#ccc;"></div>
  </div>

  <div class="row" style="margin-top:45px;">
    <div class="col-12">
      <button class="btn slider-buttonleft3"><img src="<?php echo base_url();?>/img/left.png"></button>
      <button class="btn slider-buttonright3"><img src="<?php echo base_url();?>/img/right.png"></button>
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
        });
      </script>


    </div>

  </div>
</div>
