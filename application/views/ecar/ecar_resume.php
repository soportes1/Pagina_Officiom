<div class="container">
  <div class="row">
    <!-- Productos del carrito de compras -->
    <div class="col-12 order-2 order-md-1 col-sm-12 col-md-8 " >
      <div class="row" style="margin-bottom:22px; color:#1B5D90; font-weight:400; border-bottom:2px solid #1B5D90; ">
        <div class="col-6 ">
          Producto
        </div>

        <div class="col-2 text-center" >
          Cantidad
        </div>

        <div class="col-2 text-right">
          Total
        </div>

        <div class="col-2 text-right">
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

        <div class="row" style="margin-bottom:32px; ">
          <div class="col-6 col-sm-6 ">
            <div class="media">
              <a href="<?php echo $this->config->item('base_url');?>tienda/producto/<?php echo $key ?>">
                <img class="align-self-center mr-3" style="width:80px;" src="<?php echo $this->config->item('erp_url').substr($row->img,2);?>">
              </a>
              <div class="media-body" style="max-width:250px; ">
                <p class="mb-0" style="font-size:14px;"><b><?php echo $tmpNombre; ?></b></p>
                <p style="font-size:13px;">
                  <span class="text-primary">Clave:</span> <?php echo $tmpClave; ?> <br>
                  <span class="text-primary">Marca:</span> <?php echo $tmpMarca; ?>
                </p>
              </div>
            </div>
          </div>


          <div class="col-6 col-sm-6 col-md-6 col-lg-2 text-center">
            <input type="hidden" value="<?php echo $bufferPrice;?>" name="eprice<?php echo $key; ?>" id="eprice<?php echo $key; ?>">
            Costo: $<?php echo $bufferPrice;?>
            <br>
            <div class="btn-group" role="group" aria-label="Basic example" style=" margin-top:12px;">
              <button class="btn btnEcar" onclick="rest3(<?php echo $key; ?>);"><i class="fas fa-minus" aria-hidden="true"></i></button>
              <input name="eitem<?php echo $key; ?>" id="eitem<?php echo $key; ?>" type="text" class="form-control" style="text-align: center; width:50px; height:30px; font-size:13px;" value="<?php echo $value; ?>">
              <button class="btn btnEcar" onclick="adder3(<?php echo $key; ?>);"><i class="fas fa-plus" aria-hidden="true"></i></button>
            </div>
          </div>


          <div class="col-10 col-sm-10 col-md-10 col-lg-2 text-right">
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

          <div class="col-10 col-sm-10 col-md-10 col-lg-2 text-right">
            <button type="button" onclick="removeEcar(<?php echo $key;?>)" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
          </div>
        </div>
       <?php
        }
       ?>
    </div>
    <!-- Fin de listado de carrito de compras-->



    <div class="col-12 order-1 order-md-2 col-sm-12 col-md-4 " style="padding-top:0px; padding:0; padding-left:14px;">
      <!-- Dirección de entrega -->
      <div class="card bg-light mb-3" >
        <div class="card-header">
          <h5 class="display-4" style="font-size:24px;">Datos de Entrega <i class="fas fa-truck"></i></h5>
        </div>
        <div class="card-body" style="font-size:14px;">
        <?php
          ////verificamos si contamos con una sesion o requerimos un acceso
          if($this->session->logged_in==TRUE){ ///si contamos con una session obtenemos la direccon de entrega
            ///obtenemos la direccion de entrega del usuario

        ?>
        <div class="form-group">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Dirección</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
        </div>


        <?php
          }else{ ///requerimos el inicio de la session
        ?>
        <p >Inicia sesión o crea una cuenta para continuar</p>

        <button  data-toggle="modal" data-target="#loginModal" type="button" name="button" class="btn btn-primary btn-sm" style="background-color:#1B5D90;">Iniciar Sesión</button>
        <button type="button" name="button" class="btn btn-danger btn-sm">Crear Cuenta</button>
        <?php
          }
        ?>
        </div>
      </div>

      <!-- total y pagar-->
      <div class="card bg-light mb-3"  >
        <div class="card-header">
          <h5 class="display-4" style="font-size:24px;">Resúmen de compra <i class="fas fa-clipboard-list"></i></h5>
        </div>
        <div class="card-body" style="font-size:14px;">
          <div class="ecar-resume">
            <b>Productos Solicitados:</b> <span><?php echo $items;?></span><br>
            <b>Total:</b> <span>$<?php echo number_format($total,2); ?> MXN</span><br><br>

            <?php
            if($this->session->logged_in==TRUE){
            ?>

            <p class="text-right" style="padding:0;">
              <button class="btn btn-danger" style="position:relative; left:8px;" id="finaliza">Finalizar <i class="fas fa-arrow-right"></i></button>
            </p>
           <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin de total y pagar-->
  </div>
</div>
<!-- modal de inicio de sesion -->
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card text-white bg-dark mb-3" style=" max-width: 24rem; position:relative; margin:0 auto; float:none;">
          <div class="card-header">¿Tienes una Cuenta?</div>
          <div class="card-body">
            <h5 class="card-title">¡Inicia Sesión!</h5>
            <form id="form" method="POST" action="<?php echo base_url(); ?>usuario/ingresar" name="login">
            <input type="hidden" id="registro" name="registro" value="2">
              <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none; margin-bottom:15px;">
                <label class="sr-only" for="email">*E-mail</label>
                <input class="form-control" id="email" type="text" placeholder="*E-mail" name="email">
              </div>
              <div class="form-group" style="max-width:280px; position:relative; margin:0 auto; float:none;">
                <label class="sr-only" for="telefono">Contraseña</label>
                <input class="form-control" id="password" type="password" placeholder="*Contraseña" value="" name="password">
              </div>
              <br>
              <a class="text-white " href="#">Olvide Mi Contraseña</a>
              <br>
              <p class="text-center" style="margin-top:12px;">
                <input type="hidden" name="loggin" value="1">
                <button type="submit" class="btn btn-danger text-white">Ingresar</button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($erro) AND($erro!=1)){
?>
  <script type="text/javascript">
    alert('<?php echo $erro; ?>');
  </script>
<?php
}
?>



<!-- modal de nuevo usuario -->
