<div class="container">
  <div class="row">
    <?php
      if(isset($result)  AND($result->num_rows()>0)){
          foreach ($result->result() as $row) {
            ///
             $img = $this->config->item('erp_url').substr($row->imagen,2);
    ?>
      <div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-2 text-center" style="margin-bottom:45px;">
        <a href="#">
          <div class="marc-ima-container" style="width:150px; height:150px; position:relative; margin:0 auto; float:none; b">
            <img src="<?php echo $img; ?>" class="img-fluid" style=" width:90%;
            position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
            "  >
          </div>
          <br>
          <p class="text-body font-weight-bold"><?php echo $row->marca; ?></p>

        </a>
      </div>
    <?php
          }
      }
     ?>

  </div>
</div>
