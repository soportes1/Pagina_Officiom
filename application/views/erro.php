<div class="container">
  <div class="row">
    <div class="col-12 lead" style="margin-bottom:80px; margin-top:20px; ">
      <?php
        if(isset($erro) AND($erro!="") AND($erro!=null)){
          echo '<i style="font-size:35px;" class="fas fa-exclamation-triangle text-warning"></i>
          '.$erro.'
          ';
        }else{
          echo '<h3> <i class="fas fa-times text-danger"></i> UPS! Lo sentimos, ruta desconocida</h3>';
        }
      ?>
    </div>
  </div>
</div>
