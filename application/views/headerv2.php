<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
    <title>OfficiumIX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/af60b1ea7d.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>/js/tools.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/css/estilo.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  </head>
  <body>
    <header>
      <!-- Principal Nav -->
      <input type="hidden" id="baseUrl" value="<?php echo base_url();?>">
      <nav class="navbar navbar-expand-md  main-nav topNav">
        <div class="container-fluid upper">
          <div class="navbar-collapse collapse nav-content order-2" id="logoPrincipal1">
              <ul class="nav navbar-nav">
                <a href="<?php echo base_url();?>">
                  <img src="<?php echo base_url();?>/img/logo-officium.png" class="img-fluid" style="width:210px; min-width:180px;">
                </a>
              </ul>
          </div>
          <!-- Buscador central-->
          <ul class="nav navbar-nav text-nowrap flex-row mx-md-auto order-1 order-md-2" >
              <div class="centralSearch">
                <input type="text" class="searcher" placeholder="¿Qué estas buscando?">
                <button class="btn"><i class="fas fa-search"></i></button>
              </div>
              <a href="<?php echo base_url();?>">
                <img id="logoPrincipal2" src="<?php echo base_url();?>/img/logo-officium.png" class="img-fluid">
              </a>
          </ul>

          <div class="ml-auto navbar-collapse collapse nav-content order-3 order-md-3">
            <ul class="ml-auto nav navbar-nav upperDer">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user"></i> <span style="font-size:16px;">Ingresa</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Ingresar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Registrarte</a>
                </div>
              </li>
              <li class="nav-item ctr">
                  <a class="nav-link" href="<?php echo base_url();?>tienda/cat"><i class="fas fa-list"></i> <span style="font-size:16px;;">Categorías</span></a>
              </li>
              <div class="upperLine"></div>
              <li class="nav-item ">
                  <a class="nav-link" href="#"><i class="far fa-heart"></i> <span style="font-size:16px" class="ctr">Favoritos</span></a>
              </li>
              <div class="upperLine"></div>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url();?>ecar/ecarResume">
                    <i class="fas fa-shopping-cart"></i> <span style="font-size:16px" class="ctr">Carrito</span>
                     <span id="ecounter" class="badge badge-pill badge-danger ecarCounter">0</span>
                  </a>
              </li>
          </ul>
          </div>
          <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target=".nav-content" aria-expanded="false" aria-label="Toggle navigation" style="position:absolute; right:20px; top:15px;">
              <i class="fas fa-bars"></i>
          </button>
       </div>
      </nav>

      <!-- Blue nav -->
      <div class="container-fluid" id="blueNav">
        <div class="row text-center" style="">
          <div class="col blueButton ccategory mc1">
            <div class="categorial " >
              <a href="<?php echo base_url();?>tienda/cat"> <i class="fas fa-list hvr-icon"></i> Categorías</a>
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
                  <ul id="subContainer">
                  </ul>
                </div>

                <div class="subCategory2">
                  <ul id="subContainer2">
                    asgfsdg
                  </ul>
                </div>


              </div>
            </div>
          </div>
          <div class="col blueButton mc1"><a href="<?php echo $this->config->item('base_url');?>/tienda/marcas" class="hvr-icon-bounce"> <i class="fas fa-award hvr-icon"></i> Marcas </a></div>
          <div class="col blueButton mc1" ><a href"#"  class="hvr-icon-bounce"><i class="fas fa-star hvr-icon"></i> Promociones</a></div>
        </div>
      </div>
    </header>
