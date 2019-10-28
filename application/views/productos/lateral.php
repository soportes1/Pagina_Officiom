<div class="container">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-2" style="padding:0; margin-top:15px; ">



      <form  action="" method="get" id="parametros">
        <div class="form-group" style=" width:97%;">
          <label for="filtro" style="color:#A09FA4;"><b>ORDENAR POR:</b></label>
           <select class="form-control" id="filtro" name="filtro" style="font-size:12px; border-radius:10px;">
             <option <?php  if(isset($_GET['filtro']) AND($_GET['filtro']=='f0')){ echo 'selected';} ?> value="f0">Seleccionar Filtro...</option>
             <option <?php  if(isset($_GET['filtro']) AND($_GET['filtro']=='f1')){ echo 'selected';} ?> value="f1">De Menor a Mayor Precio</option>
             <option <?php  if(isset($_GET['filtro']) AND($_GET['filtro']=='f2')){ echo 'selected';} ?> value="f2">De Mayor a Menor Precio</option>
          <!--   <option <?php  if(isset($_GET['filtro']) AND($_GET['filtro']=='f3')){ echo 'selected';} ?> value="f3">Calificación</option>--->
           </select>
         </div>
         <br>

        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><label for="filtro" style="color:#A09FA4; cursor:pointer;"><b>MARCAS <i class="fas fa-chevron-down text-danger"></i></b></label></a>
          <div class="collapse" id="collapseExample" style="max-height:850px; overflow-y:auto;">
            <ul class="list-unstyled marcs">
              <?php
               if(isset($marcas) AND(count($marcas)>0)){
                 $cantidad_marcas = count($marcas);
                 for ($j=0; $j < $cantidad_marcas ; $j++) {
                   ?>
                   <li><button class="btn btn-marcas" type="submit" name="marca" value="<?php echo $marcas[$j]; ?>"> <i class="fas fa-chevron-right"></i><?php echo $marcas[$j]; ?></button> </li>
                   <?php
                 }
               }
              ?>
            </ul>
          </div>
      </form>



      <script type="text/javascript">
        $(document).ready(function(){
          $("#filtro").change(function(){
            $("#parametros").submit();
          });
        });
      </script>
     </div>
