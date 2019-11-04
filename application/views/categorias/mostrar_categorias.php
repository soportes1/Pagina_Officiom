<div class="container">
  <div class="row">

    <div class="col-6 col-md" style="margin-bottom:50px;">
      <div class="categorias-child" >
        <a href="<?php echo base_url();?>producto/results/categoria/1">
          <img src="<?php echo base_url(); ?>/img/categorias/1.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Escolares y Oficina</span>
        </a>
      </div>
    </div>

    <div class="col-6 col-md" style="margin-bottom:50px;">
      <div class="categorias-child">
        <a href="<?php echo base_url();?>producto/results/categoria/2">
          <img src="<?php echo base_url(); ?>/img/categorias/2.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Papel</span>
        </a>
      </div>
    </div>

    <div class="col-6 col-md" style="margin-bottom:50px;">
      <div class="categorias-child">
        <a href="<?php echo base_url();?>producto/results/categoria/3">
          <img src="<?php echo base_url(); ?>/img/categorias/3.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Tintas y Toners</span>
        </a>
      </div>
    </div>

    <div class="col-6 col-md" style="margin-bottom:50px;">
      <div class="categorias-child">
        <a href="<?php echo base_url();?>producto/results/categoria/4">
          <img src="<?php echo base_url(); ?>/img/categorias/4.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Tecnología</span>
        </a>
      </div>
    </div>

    <div class="col-6 col-md" style="margin-bottom:50px;">
      <div class="categorias-child">
        <a href="<?php echo base_url();?>producto/results/categoria/5">
          <img src="<?php echo base_url(); ?>/img/categorias/5.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Accesorios</span>
        </a>
      </div>
    </div>

    <div class="col-6 col-md" style="margin-bottom:50px;">
      <div class="categorias-child">
        <a href="<?php echo base_url();?>producto/results/categoria/6">
          <img src="<?php echo base_url(); ?>/img/categorias/6.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Muebles</span>
        </a>
      </div>
    </div>

    <div class="col-6 col-md" style="margin-bottom:50px;">
      <div class="categorias-child">
        <a href="<?php echo base_url();?>producto/results/categoria/7">
          <img src="<?php echo base_url(); ?>/img/categorias/7.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Tlapalería</span>
        </a>
      </div>
    </div>

    <div class="col-6 col-md" style="margin-bottom:50px;">
      <div class="categorias-child">
        <a href="<?php echo base_url();?>producto/results/categoria/8">
          <img src="<?php echo base_url(); ?>/img/categorias/8.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Limpieza</span>
        </a>
      </div>
    </div>

    <div class="col-12 col-md" style="margin-bottom:50px;">
      <div class="categorias-child">
        <a href="<?php echo base_url();?>producto/results/categoria/9">
          <img src="<?php echo base_url(); ?>/img/categorias/9.png"><br>
          <span style="color:#A09FA4; font-weight:bold;">Cafetería</span>
        </a>
      </div>
    </div>


  </div>
  <!--<div class="row">
    <?php
    if(isset($categorias) AND($categorias->num_rows()>0)){
      foreach ($categorias->result() as $row) {
        $bufferThumb = substr($row->imagen,2);
    ?>
    <div class="col-md col-xs-6 col-sm-6 col-md-4 ctg-parent">
      <a href="<?php echo $this->config->item('base_url') ?>/tienda/subct/<?php echo $row->id; ?>" class="text-reset">
        <div class="ctg-container">
          <div class="media">
            <img style="width:85px; height:85px;" src="<?php echo $this->config->item('erp_url');?>/<?php echo $bufferThumb; ?>" class="align-self-center mr-3 rounded" alt="...">
            <div class="media-body">
              <h6 class="mt-4"><?php echo $row->nombre;?></h6>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php
      }
    }
    ?>
  </div> -->
  </div>
</div>
