<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-2" style="padding:0">
      <form  action="" method="get" id="parametros">
        <div class="form-group">
          <label for="filtro" style="color:#A09FA4;"><b>ORDENAR POR:</b></label>
           <select class="form-control" id="filtro" name="filtro" style="font-size:12px; border-radius:15px;">
             <option <?php  if(isset($_GET['filtro']) AND($_GET['filtro']=='f0')){ echo 'selected';} ?> value="f0">Seleccionar Filtro...</option>
             <option <?php  if(isset($_GET['filtro']) AND($_GET['filtro']=='f1')){ echo 'selected';} ?> value="f1">De Menor a Mayor Precio</option>
             <option <?php  if(isset($_GET['filtro']) AND($_GET['filtro']=='f2')){ echo 'selected';} ?> value="f2">De Mayor a Menor Precio</option>
             <option <?php  if(isset($_GET['filtro']) AND($_GET['filtro']=='f3')){ echo 'selected';} ?> value="f3">Calificación</option>
           </select>
         </div>
         <br>
         <?php ?>
         <label for="filtro" style="color:#A09FA4;"><b>Marcas:</b></label>

      </form>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#filtro").change(function(){
            $("#parametros").submit();
          });
        });
      </script>
     </div>
     <!-- fin de menu lateral -->

     <!-- pantalla de productos -->
     <div class="col-12 col-sm-12 col-md-12 col-lg-10">
       <div class="row">
         <div class="col-12 text-right" style="margin-bottom:25px; color:#A09FA4;">
           Encontramos <b><?php echo $cproductos?> </b> resultados.
           <?php


           ?>
         </div>
       </div>

       <div class="row">
         <?php if(isset($productos) AND($productos->num_rows()>0)){
           foreach ($productos->result() as $row){
        ?>
        <div class="col-md" style=" padding:0; margin-bottom:18px;">

          <div class="items-container inter" style="">
            <div class="items-child">
              <div class="items-img" style="padding-top:4px;">
                <a href="<?php echo $this->config->item('base_url');?>/tienda/producto/<?php echo $row->pid;?>">
                  <img src="<?php echo $this->config->item('erp_url')?>/<?php echo $row->img; ?>" class="img-fluid">
                </a>
              </div>

              <div style="text-transform:uppercase; width:195px; position:relative; margin: 0 auto; font-size:14px; font-weight:500;" class="text-center">
                <a class="text-decoration-none text-reset" href="<?php echo $this->config->item('base_url');?>/tienda/producto/<?php echo $row->pid;?>">
                  <?php echo $row->producto;?>
                </a>
              </div>

              <div style="width:195px; position:relative; margin: 0 auto; font-size:12px; font-weight:bold; color:#A8A8A8;" class="text-center">
                Marca: <?php echo $row->marca;?>
              </div>

              <div style="width:195px; position:relative; margin: 0 auto; font-size:22px;color:#FF0000;" class="text-center">
                <?php
                ///del precio del proveedor mas alto
                  $basePrice = max($row->precio_principal,$row->precio_principal,$row->precio_principal);
                  $bufferAdd = $basePrice * 0.8;
                  $tmpPrice = $bufferAdd + $basePrice;
                  echo "$ ".number_format($tmpPrice,2);
                 ?>
              </div>

              <div style="width:195px; position:relative; margin: 0 auto; font-size:14px;  color:#84AC49;" class="text-center">
                <?php
                ///verificamos si el producto esta disponible
                if(isset($row->stock) AND($row->stock>0)){
                  echo 'Disponible';
                }else{
                  echo 'Sin Stock';
                }
                ?>
              </div>

              <div class="items-buttons">
                <div class="btn-group" role="group" aria-label="Basic example" style="">
                  <button type="button" onclick="rest(<?php echo $row->pid;?>);" class="btn btnEcar"><i class="fas fa-minus"></i></button>
                  <input id="eitem<?php echo $row->pid;?>" type="text" class="form-control" style="width:50px; height:30px; font-size:13px;" value="1" readonly>
                  <button type="button" onclick="adder(<?php echo $row->pid;?>);" class="btn btnEcar"><i class="fas fa-plus"></i></button>
                </div>
                <button type="button" onclick="addtoCart(<?php echo $row->pid;?>,'<?php echo $tmpPrice;?>','<?php echo $row->producto;?>')" class="btn btn-danger btn-ecar"><i class="fas fa-shopping-cart"></i></button>
              </div>

            </div>
          </div>
        </div>
        <?php
           }
         }
         ?>
         <div class="col-12">
           <form action="" method="get">
            <?php
             if(isset($_GET['filtro']) AND($_GET['filtro']!="")){
            ?>
            <input type="hidden" name="filtro" value="<?php echo $_GET['filtro'];?>">
            <?php
             }
             ?>
             <nav aria-label="...">
               <ul class="pagination pagination-sm justify-content-center">
                 <?php
                  for($i=1;$i<=6;$i++){
                    if(isset($_GET['page'])){
                      if($_GET['page']==$i){
                        $adder='active';
                      }else{
                        $adder='';
                      }
                    }else{
                        if($i==1){
                          $adder='active';
                        }else{
                          $adder='';
                        }
                    }
                 ?>
                 <li class="page-item <?php echo $adder; ?>"><button name="page" class="page-link" value="<?php echo $i;?>"><?php echo $i;?></button></li>
                <?php
                 }
                 ?>
               </ul>
             </nav>
          </form>
           <!-- fin de paginacion-->
         </div>

       </div>


     </div>
     <!-- fin de pantalla de productos -->
  </div>
</div>
