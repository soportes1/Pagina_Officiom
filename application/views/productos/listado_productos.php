    <div class="col-12 col-sm-12 col-md-12 col-lg-10">
      <div class="row">
        <div class="col-12 text-right" style="margin-bottom:25px; color:#A09FA4;">
          Encontramos <b><?php echo $cantidad_resultados;?> </b> resultados.
        </div>
      </div>


      <div class="row">
        <?php if(isset($productos) AND($productos->num_rows()>0)){
          foreach ($productos->result() as $row){
       ?>
       <div class="col-md" style=" padding:0; margin-bottom:18px;">
         <div class="items-container inter" >
           <div class="items-child">
             <!-- IMAGEN -->
             <?php
             if($row->thumb!=""){
               $ima = $row->thumb;
             }else{
               $ima = $row->img;
             }
             ?>
             <a href="<?php echo $this->config->item('base_url');?>/tienda/producto/<?php echo $row->pid;?>">
               <div class="items-img" style="padding-top:4px;">
                  <img src="<?php echo $this->config->item('erp_url')?>/<?php echo $ima; ?>" class="img-fluid">
               </div>
             </a>
             <!-- FIN DE IMAGEN -->

             <!-- Bloque de Producto -->
             <div style="text-transform:uppercase; width:195px; position:relative; margin: 0 auto; font-size:14px; font-weight:500;" class="text-center">
               <a class="text-decoration-none text-reset" href="<?php echo $this->config->item('base_url');?>/tienda/producto/<?php echo $row->pid;?>">
                 <?php echo $row->producto;?>
               </a>
             </div>
             <div style="width:195px; position:relative; margin: 0 auto; font-size:12px; font-weight:bold; color:#A8A8A8;" class="text-center">
               Marca: <?php echo $row->marca;?>
             </div>
            <!-- Fin Bloque de Producto -->

            <div style="width:195px; position:relative; margin: 0 auto; font-size:22px;color:#FF0000;" class="text-center">
              <?php
                ///del precio del proveedor mas alto
                $precio_final = $this->apicall->calculator($row->precio_principal,$row->precio_principal2,$row->precio_principal3);
                echo "$".$precio_final;
               ?>
            </div>

             <div style="width:195px; position:relative; margin: 0 auto; font-size:14px;  color:#84AC49;" class="text-center">
               <?php
               ///verificamos si el producto esta disponible
               $rst = $this->Productos->inquery("SELECT stock FROM stock WHERE id_producto=".$row->pid);
               foreach ($rst->result() as $value) {
                 $stock = $value->stock;
               }
               if(isset($stock) AND($stock>0)){
                 echo 'Disponible';
               }else{
                 echo 'Sobre Pedido';
               }

               ?>
             </div>

             <div class="items-buttons">
               <div class="btn-group" role="group" aria-label="Basic example" style="">
                 <button type="button" onclick="rest(<?php echo $row->pid;?>);" class="btn btnEcar"><i class="fas fa-minus"></i></button>
                 <input id="eitem<?php echo $row->pid;?>" type="text" class="form-control" style="width:50px; height:30px; font-size:13px;" value="1" readonly>
                 <button type="button" onclick="adder(<?php echo $row->pid;?>);" class="btn btnEcar"><i class="fas fa-plus"></i></button>
               </div>
               <button type="button" onclick="addtoCart(<?php echo $row->pid;?>,'<?php echo $precio_final;?>','<?php echo $row->producto;?>')" class="btn btn-danger btn-ecar"><i class="fas fa-shopping-cart"></i></button>
             </div>
           </div>
         </div>
       </div>
       <?php
          }
        }
        ?>
      </div>
      <!-- Finalizacion de pantalla de productos -->


      <div class="row mt-5">
        <div class="col-12 text-cemter">
          <nav aria-label="Page navigation example">
              <?php echo $this->pagination->create_links();?>
          </na>
        </div>
      </div>

    </div>

    <!-- Finalizacion de listado de productos -->
  </div>
</div>
