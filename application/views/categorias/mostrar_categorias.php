<div class="container">
  <div class="row">
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

    </div>
  </div>
</div>
