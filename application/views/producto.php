<?php
  if(isset($result)){
    foreach ($result->result() as $row){
      $img = $this->config->item('erp_url').substr($row->img,2);
?>
  <div class="container">
    <div class="row" style="margin-bottom:32px;">
      <div class="col-12">
        <h4 class="item-tittle "><?php echo $row->producto?></h4>
      </div>
    </div>


    <div class="row">
      <div class="col-12 col-md-5">
        <div class="img-container text-center">
          <img src="<?php echo $img;?>" class="img-fluid">
        </div>
        <div class="item-thumnails-container">
          <img src="<?php echo $img;?>" class="img-thumbnail" style="width:80px; max-height:120px;">
          <img src="<?php echo $img;?>" class="img-thumbnail" style="width:80px; max-height:120px;">
          <img src="<?php echo $img;?>" class="img-thumbnail" style="width:80px; max-height:120px;">
        </div>



      </div>
      <div class="col-12 col-md-4 item-descripcion">
        <b>Descripción:</b><br>
        <?php echo $row->descripcion;?>
        <br><br>
        Modelo: <?php echo $row->modelo;?><br>
        Clave:<?php echo $row->clave_interna;?><br>
        Código:<?php echo $row->sku;?><br>
        Marca:<?php echo $row->marca;?><br>
      </div>
      <div class="col-12 col-md-3 text-center">
        <?php
        ///obtenemos los costos de proveedor
        $price1 = $row->precio_principal;
        $price2 = $row->precio_principal2;
        $price3 = $row->precio_principal3;
        $precio_base =  max($price1,$price2,$price3);
        ///agregamos el margen de utilidad del %20
        $price = $precio_base*1.20;
        $price = number_format($price,2);

        ///verificamos si tiene iva
        if($row->iva>0){
          $tmpIva = $price * 0.16;
          $tmpIva = number_format($tmpIva,2);
          $price = $price+$tmpIva;
        }
        ///verificamos si tiene ieps
        if($row->ieps>0){
          $price = $price+$row->ieps;
        }

        ?>
        <div class="text-center" style=" line-height: 0.9;"><b style="font-size:11px;">PRECIO</b></div>
        <div class="item-price">$<?php echo $price;?></div>
        <div class="item-small-legend" style=" line-height: 0.9;">IVA Incluido</div>

        <div class="btn-group" role="group" aria-label="Basic example" style=" margin-top:12px;">
          <button class="btn btnEcar"><i class="fas fa-minus"></i></button>
          <input type="text" class="form-control" style="text-align: center; width:160px; height:30px; font-size:13px;" value="1">
          <button class="btn btnEcar"><i class="fas fa-plus"></i></button>
        </div>
        <br>
        <button type="button" class="btn btn-danger item-btn-ecar"><i class="fas fa-shopping-cart"></i> COMPRAR</button>
        <div class="item-small-legend" style=" line-height: 0.9; margin-top:6px;">Piezas Disponibles: <?php echo $row->stock;?></div>


      </div>
    </div>


  </div>
<?php
    }
  }
?>
