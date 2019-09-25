<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
    <title>OffiumIX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/af60b1ea7d.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>/js/tools.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/css/estilo.css">
  </head>
  <body>
    <header>
      <!-- Principal Nav -->
      <input type="hidden" id="baseUrl" value="<?php echo base_url();?>">
      <nav class="navbar navbar-expand-md  main-nav topNav">
        <div class="container-fluid upper">
                <div class="navbar-collapse collapse nav-content order-2" id="logoPrincipal1">
                    <ul class="nav navbar-nav">
                      <img src="<?php echo base_url();?>/img/logo-officium.png" class="img-fluid" style="width:210px; min-width:180px;">
                    </ul>
                </div>
                <!-- Buscador central-->
                <ul class="nav navbar-nav text-nowrap flex-row mx-md-auto order-1 order-md-2" >
                    <div class="centralSearch">
                      <input type="text" class="searcher" placeholder="¿Qué estas buscando?">
                      <button class="btn"><i class="fas fa-search"></i></button>
                    </div>
                    <img id="logoPrincipal2" src="<?php echo base_url();?>/img/logo-officium.png" class="img-fluid">
                </ul>

                <div class="ml-auto navbar-collapse collapse nav-content order-3 order-md-3">
                    <ul class="ml-auto nav navbar-nav upperDer">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user"></i> <span style="font-size:16px;">Ingresa</span>
                              <i style="font-size:12px;" class="fas fa-chevron-down"></i>
                            </a>
                        </li>
                        <li class="nav-item ctr">
                            <a class="nav-link" href="#"><i class="fas fa-list"></i> Categorías</a>
                        </li>
                        <div class="upperLine"></div>
                        <li class="nav-item ">
                            <a class="nav-link" href="#"><i class="far fa-heart"></i></a>
                        </li>
                        <div class="upperLine"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                        </li>



                    </ul>
                </div>
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target=".nav-content" aria-expanded="false" aria-label="Toggle navigation" style="position:absolute; right:50px; top:15px;">
                    <i class="fas fa-bars"></i>
                </button>
       </div>
      </nav>

      <!-- Blue nav -->
      <div class="container-fluid" id="blueNav">
        <div class="row text-center" style="">
          <div class="col blueButton ccategory mc1">
            <div class="categorial">
              <i class="fas fa-list"></i> Categorías
              <div class="categoryContainer" >
                <div class="listCategory">
                  <ul>
                    <?php if(isset($categorias)){
                      foreach ($categorias->result() as  $row) {
                    ?>
                      <li class="categoryName" onmouseover="shown('<?php echo $row->id;?>','<?php echo $row->nombre;?>')" ><?php echo $row->nombre;?><i class="fas fa-chevron-right catChev"></i></li>
                    <?php
                      }
                    }
                    ?>
                  </ul>
                </div>
                <div class="subCategory">
                  <div class="category-tittle">Título de Categoría</div>
                  <div class="inContainer">
                    <?php for($i=0; $i<5; $i++){ ?>
                    <div class="tpContainer">
                      <a href="">Sub Categoría</a>
                      <a href="">Tipo de Producto</a>
                      <a href="">Tipo de Producto</a>
                      <a href="">Tipo de Producto</a>
                    </div>
                    <?php } ?>
                  </div>

                </div>
              </div>
            </div>

          </div>
          <div class="col blueButton mc1"><i class="fas fa-award"></i> Marcas</div>
          <div class="col blueButton mc1"><i class="fas fa-star"></i> Promociones</div>
        </div>
      </div>
    </header>
