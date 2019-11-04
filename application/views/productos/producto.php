<?php
  if(isset($result)){
    foreach ($result->result() as $row){
      if($row->thumb!=""){
        $img = $row->thumb;
        $img = $this->config->item('erp_url').substr($row->thumb,2);
      }else{
        $img = $row->img;
        $img = $this->config->item('erp_url').substr($row->img,2);
      }


      $id = $row->pid;
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
          <a data-fancybox="gallery" href="<?php echo $img;?>">
            <img src="<?php echo $img;?>" class="img-fluid">
          </a>

        </div>
        <!--
        <div class="item-thumnails-container">
          <img src="<?php echo $img;?>" class="img-thumbnail" style="width:80px; max-height:120px;">
          <img src="<?php echo $img;?>" class="img-thumbnail" style="width:80px; max-height:120px;">
          <img src="<?php echo $img;?>" class="img-thumbnail" style="width:80px; max-height:120px;">
        </div>-->
      </div>
      <div class="col-12 col-md-4 item-descripcion align-self-start" style="margin-bottom:50px;">
        <b>Descripción:</b><br>
        <?php echo $row->descripcion;?>
        <hr>
        Modelo: <?php echo $row->modelo;?><br>
        Código:<?php echo $row->sku;?><br>
        Marca:<?php echo $row->marca;?>
        <br><br>
        <span >
          <b>Compartir:</b>
           <button   data-toggle="modal" data-target="#exampleModal"   style="padding:1px;" class="btn" >
             <i class="fas fa-envelope" data-toggle="tooltip" title="Compartir con un Amigo"></i>
           </button>
          <button data-toggle="tooltip" title="Agregar a Favoritos" style="padding:1px;" class="btn" ><i class="fas fa-heart"></i></button>
        </span>
      </div>

      <div class="col-12 col-md-3 text-center align-self-start">
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
        <div class="text-center" style=" line-height: 0.9;"><b style="font-size:18px;">PRECIO</b></div>
        <div class="item-price" style="font-size:35px;">$<?php echo $price;?></div>
        <div class="item-small-legend" style=" line-height: 0.9;">IVA Incluido</div>
        <div class="btn-group" role="group" aria-label="Basic example" style=" margin-top:12px;">
          <button class="btn btnEcar" onclick="rest(<?php echo $id;?>);"><i class="fas fa-minus"></i></button>
          <input name="eitem<?php echo $id ?>" id="eitem<?php echo $id ?>" type="text" class="form-control" style="text-align: center; width:160px; height:30px; font-size:13px;" value="1">
          <button class="btn btnEcar" onclick="adder(<?php echo $id;?>);"><i class="fas fa-plus"></i></button>
        </div>
        <br>
        <button onclick="addtoCart(<?php echo $id;?>,<?php echo $price;?>,'<?php echo $row->producto;?>')" type="button" class="btn btn-danger item-btn-ecar"><i class="fas fa-shopping-cart"></i> COMPRAR</button>
        <div class="item-small-legend" style=" line-height: 0.9; margin-top:6px;">Piezas Disponibles:
          <?php
          if(isset($row->stock)){
            echo $row->stock;
          }else{
            echo 0;
          }
         ?>
       </div>
      </div>
    </div>

    <div class="row" style="margin-top:50px;">
      <div class="col-12 table-responsive item-descripcion">
        <h6 style="font-weight:bold;">Ficha Técnica del Producto:</h6>
        <table class="table table-bordered table-striped">
          <tbody>
            <tr>
              <td class="w-25">Producto:</td>
              <td class="w-50"><?php echo $row->producto;?></td>
            </tr>
            <tr>
              <td class="w-25">Descripción:</td>
              <td class="w-50"><?php echo $row->descripcion;?></td>
            </tr>
            <tr>
              <td class="w-25">Clave:</td>
              <td class="w-50"><?php echo $row->clave_interna;?></td>
            </tr>
            <tr>
              <td class="w-25">Código</td>
              <td class="w-50"><?php echo $row->sku;?></td>
            </tr>
            <tr>
              <td class="w-25">Modelo:</td>
              <td class="w-50"><?php echo $row->modelo;?></td>
            </tr>
            <tr>
              <td class="w-25">País Origen:</td>
              <td class="w-50"><?php echo $row->pais_procedencia;?></td>
            </tr>


            <tr>
              <td class="w-25">Empaque:</td>
              <td class="w-50"><?php echo $row->emp;?></td>
            </tr>

            <tr>
              <td class="w-25">Piezas/Empaque:</td>
              <td class="w-50"><?php echo $row->cant_empaque;?></td>
            </tr>

            <tr>
              <td class="w-25">Unidad:</td>
              <td class="w-50"><?php echo $row->unidad;?> : <?php echo $row->cant_unidad;?></td>
            </tr>




          </tbody>
        </table>
      </div>
    </div>

  </div>
<?php
    }
  }
?>


<!--  Modals-->

<!-- modal de compartir -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Compartir por correo electrónico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="comparte">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">* Tu nombre:</label>
            <input type="text" class="form-control" id="nombre">
          </div>
					<div class="form-group">
            <label for="recipient-name" class="col-form-label">*Correo de tu amig@:</label>
            <input type="text" class="form-control" id="femail">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mensaje:</label>
            <textarea class="form-control" id="message"></textarea>
          </div>

        </form>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-primary" style="background-color:#1B5D90;">Compartir <i class="fas fa-paper-plane"></i></button>
      </div>
    </div>
  </div>
</div>
<!-- din modal de compartir -->






<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
