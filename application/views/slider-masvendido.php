<div class="container-fluid" style="padding-top:18px;">
  <div class="row">
    <div class="col-12 col-md-6 m1" style="padding-left:85px;" data-aos="fade-right" data-aos-delay="0">


        <div style="position:relative; float:left">
          <span class="st3" style="color:#A09FA4; font-size:36px;"><i class="far fa-hand-point-right"></i></span>
        </div>
        <div style="position:relative; float:left">
          <span class="st1" style="position: relative; font-weight:500; color:#A09FA4; font-size:40px; line-height:8px;. display:inline-block;">Lo +</span>
          <span class="st2" style="position: relative; color:#1B5D90; font-weight:bold; font-size:40px; display:inline;">Vendido</span>
        </div>


    </div>
    <!-- responsive tittle-->
    <div class="col-12  m2" data-aos="fade-right" data-aos-delay="0">
      <div class="tittleContainer">
        <span class="st3" style="color:#A09FA4; font-size:36px;"><i class="far fa-hand-point-right"></i></span>
        <span class="st1" style="position: relative;font-weight:500; color:#A09FA4; font-size:40px; line-height:8px;. display:inline-block;">Lo +</span>
        <span class="st2" style="position: relative; color:#1B5D90; font-weight:bold; font-size:40px; display:inline;">Vendido</span>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-1"></div>
    <div class="col-10" style="min-height:1px; max-height: 1px;background-color:#ccc;"></div>
  </div>

  <div class="row" style="margin-top:5px;">
    <div class="col-12">
      <button class="btn btn-sliderleft slider-buttonleft2"></button>
      <button class="btn btn-sliderright slider-buttonright2"></button>

      <div class="owl-carousel owl-masvendido" style="width:88% !important; position:relative; margin:0 auto;">
        <?php
          $productos = $this->Productos->productos_masvendidos('f0','1','3000');
          if(isset($productos) AND($productos->num_rows()>0)){
            foreach ($productos->result() as $row){

              if($row->thumb!=""){
                $img = $row->thumb;
              }else{
                $img = $row->img;
              }
        ?>
        <div class="items-container" style="">
          <div class="items-child">
            <div class="items-img">
              <a href="<?php echo $this->config->item('base_url');?>/tienda/producto/<?php echo $row->pid;?>">
                <img src="<?php echo $this->config->item('erp_url')?>/<?php echo $img; ?>" class="img-fluid">
              </a>
            </div>

            <div style="width:195px; position:relative; margin: 0 auto; font-size:14px; font-weight:500;" class="text-center">
              <a class="text-decoration-none text-reset" href="<?php echo $this->config->item('base_url');?>/tienda/producto/<?php echo $row->pid;?>">
                <?php echo $row->producto;?>
              </a>
            </div>

            <div style="width:195px; position:relative; margin: 0 auto; font-size:12px; font-weight:bold; color:#A8A8A8;" class="text-center">
              Marca: <?php echo $row->marca;?>
            </div>

            <div style="width:195px; position:relative; margin: 0 auto; font-size:22px;color:#FF0000;" class="text-center">
              <?php
              ///del precio del proveedor mas alto
                $basePrice = max($row->precio_principal,$row->precio_principal,$row->precio_principal);
                $tmpPrice = $basePrice * 1.20; ///margen de utilidad
                $tmpPrice = $tmpPrice * 1.16;
                echo "$ ".number_format($tmpPrice,2);
               ?>
            </div>
            <div style="width:195px; position:relative; margin: 0 auto; font-size:14px;  color:#84AC49;" class="text-center">
              <?php
              ///verificamos si el producto esta disponible
              if(isset($row->stock) AND($row->stock>0)){
                echo 'Disponible';
              }else{
                echo 'Sobre Pedido';
              }
              ?>

            </div>
            <div class="items-buttons">
              <div class="btn-group" role="group" aria-label="Basic example" style="">
                <button type="button" onclick="rest2(<?php echo $row->pid;?>);" class="btn btnEcar"><i class="fas fa-minus"></i></button>
                <input id="eitem<?php echo $row->pid;?>" type="text" class="form-control eitem<?php echo $row->pid;?>" style="width:50px; height:30px; font-size:13px;" value="1" readonly>
                <button type="button" onclick="adder2(<?php echo $row->pid;?>);" class="btn btnEcar"><i class="fas fa-plus"></i></button>
              </div>
              <button type="button" onclick="addtoCart(<?php echo $row->pid;?>,'<?php echo $tmpPrice;?>','<?php echo $row->producto;?>')" class="btn btn-danger btn-ecar"><i class="fas fa-shopping-cart"></i></button>
            </div>
          </div>
        </div>
        <?php
            }
          }
        ?>
      </div>

      <script type="text/javascript">
        $(document).ready(function(){
          var owlvendido =  $('.owl-masvendido');
          owlvendido.owlCarousel({
              loop:true,
              stagePadding: 5,
              margin:10,
              responsiveClass:true,
              nav: false,
              autoplay:false,
              responsive:{
                  0:{
                      items:1,
                      margin:0,
                      center:true,
                      nav:false
                  },
                  600:{
                    items:2,
                    nav:false
                  },
                  780:{
                      stagePadding: 14,
                      items:3,
                      nav:false
                  },
                  1000:{
                      items:4,
                      margin:30,
                      nav:false,
                  },
                  1200:{
                      items:5,
                      nav:false,
                  }
              }
          });
          $(".slider-buttonleft2").click(function(){
            owlvendido.trigger('prev.owl.carousel');
          });
          $(".slider-buttonright2").click(function(){
            owlvendido.trigger('next.owl.carousel');
          });
        });
      </script>



    </div>

  </div>
</div>
