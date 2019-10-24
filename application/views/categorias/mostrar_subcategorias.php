<div class="container">
  <?php
    if(isset($subcategorias) AND(count($subcategorias)>0)){
      $csubs = count($subcategorias); ///cantidad de subcategorias
      for ($i=0; $i < $csubs; $i++) {
  ?>
  <div class="row" style="margin-bottom:28px;">
    <div class="col-12 lead" style="color:#A09FA4; font-weight:bold; margin-bottom:12px;">
      <p><u><?php echo $subcategorias[$i][1]?></u></p>
    </div>
    <div class="col-12">
      <ul class="subcategory_list" >
    <?php
      $ctep = count($tep[$i]);
      for ($j=0; $j < $ctep ; $j++) {
    ?>
        <?php echo '<li><a href="'.$this->config->item('base_url').'/tienda/tipoproductos/'.$tep[$i][$j][0].'">'.$tep[$i][$j][1].'<a/></li>';?>
    <?php
      }
    ?>
      </ul>
    </div>
  </div>
  <hr>
  <?php
      }//end parent for
    }///end if
   ?>
</div>
