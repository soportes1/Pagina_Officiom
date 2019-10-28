<div class="container">

  <div class="row" style="margin-bottom:22px; color:#1B5D90; font-weight:bold;">
    <div class="col-5 ">
      Producto
    </div>

    <div class="col-2 text-center">
      Cantidad
    </div>

    <div class="col-2 text-center">
      Precio
    </div>

    <div class="col-2 text-center">
      Total
    </div>

    <div class="col-1 text-center">
      Eliminar
    </div>
  </div>

  <!-- resumen de pedido-->
  <?php
    ////obtenemos los datos del producto
    $total=0;
    $items=0;
    foreach($productos as $key => $value){ ///key el
      $tmpId = $key;
      $result = $this->Productos->informacion_producto($key); ///obtenemos la informacion del producto
      foreach ($result->result() as $row){
        $tmpNombre = $row->producto; ///nombre corto del producto
        $tmpImagen = $row->imagen; ///imagen
        $tmpClave = $row->clave_interna;
        $tmpMarca = $row->marca;
        $basePrice = max($row->precio_principal,$row->precio_principal2,$row->precio_principal3); ///precio base
        $bufferPrice = $basePrice * 1.20;
        $bufferPrice = number_format($bufferPrice,2);
        $id = $row->pid;

        ///verificamos si tiene iva
        if($row->iva){
          $tmpIva = $bufferPrice * 0.16;
          $tmpIva = number_format($tmpIva,2);
          $bufferPrice = $bufferPrice+$tmpIva;
        }

        if($row->ieps>0){
          $bufferPrice = $bufferPrice+$row->ieps;
        }
      }
    ?>

    <div class="row" style="margin-bottom:32px;">
      <div class="col-5">
        <div class="media">
          <img class="align-self-center mr-3" style="width:80px;" src="<?php echo $this->config->item('erp_url').substr($row->img,2);?>">
          <div class="media-body" style="max-width:250px; ">
            <p class="mb-0"><b><?php echo $tmpNombre; ?></b></p>
            <p style="font-size:13px;">
              <span class="text-primary">Clave:</span> <?php echo $tmpClave; ?> <br>
              <span class="text-primary">Marca:</span> <?php echo $tmpMarca; ?>
            </p>
          </div>
        </div>
      </div>

      <div class="col-2" >
        <div class="btn-group" role="group" aria-label="Basic example" style=" margin-top:12px;">
          <button class="btn btnEcar" onclick="rest(<?php echo $key; ?>);"><i class="fas fa-minus" aria-hidden="true"></i></button>
          <input name="eitem<?php echo $key; ?>" id="eitem<?php echo $key; ?>" type="text" class="form-control" style="text-align: center; width:80px; height:30px; font-size:13px;" value="<?php echo $value; ?>">
          <button class="btn btnEcar" onclick="adder(<?php echo $key; ?>);"><i class="fas fa-plus" aria-hidden="true"></i></button>
        </div>
      </div>

      <div class="col-2 text-center">
        $<?php echo $bufferPrice;?>
      </div>

      <div class="col-2 text-center">
        <?php
        $itmsubtotal = $basePrice * $value; ///calculamos el subtotal del producto sin iva
        $itmsubtotal = $itmsubtotal * 1.20; ///mu
        $itmsubtotal = $itmsubtotal; ///fixed 2 decimals

        if($row->iva>0){ ///agregamos iva
          $itmsubtotal = $itmsubtotal * 1.16;
        }

        if($row->ieps>0){ ///agregamos ieps
          $tmpIeps = $row->ieps * $value;
          $itmsubtotal = $itmsubtotal + $tmpIeps;
        }

        echo '$'.number_format($itmsubtotal,2);
        $total = $total + $itmsubtotal;
        $items++;
        ?>
      </div>


      <div class="col-1 text-center">
        <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
      </div>
    </div>

   <?php
    }
   ?>

  <!-- total y pagar-->
  <div class="row">
    <div class="col-12 text-right">
      <b>Productos Solicitados: <?php echo $items;?><br>
      Total: $<?php echo number_format($total,2); ?></b><br><br>
      <button class="btn btn-danger">Finalizar <i class="fas fa-arrow-right"></i></button>
    </div>
  </div>
</div>
