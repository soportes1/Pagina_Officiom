<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
    <title>OfficiumIX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--
    <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  -->
    <script src="https://kit.fontawesome.com/af60b1ea7d.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>/js/tools.js" crossorigin="anonymous"></script>
    <!-- css
    <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="<?php echo base_url();?>/css/estilo.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  </head>
  <body style="height:100%;">

    <header>
      <!-- Principal Nav -->
      <input type="hidden" id="baseUrl" value="<?php echo base_url();?>">
      <nav class="navbar navbar-expand-md  main-nav  topNav" style="min-height:80px;">
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
            <form action="/officium/web/producto/results/busqueda/1" method="GET">
              <div class="centralSearch">
                <input type="text" class="searcher" placeholder="¿Qué estas buscando?" name="busqueda">
                <button class="btn"><i class="fas fa-search"></i></button>
              </div>
              <a href="<?php echo base_url();?>">
                <img id="logoPrincipal2" src="<?php echo base_url();?>/img/logo-officium.png" class="img-fluid">
              </a>
            </form>
          </ul>

          <div class="ml-auto navbar-collapse collapse nav-content order-3 order-md-3">
            <ul class="ml-auto nav navbar-nav upperDer" >
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user"></i> <span style="font-size:16px;">
                    <?php if($this->session->logged_in==TRUE){
                    echo 'Mi Cuenta';
                  }else{
                    echo 'Ingresa';
                  }
                     ?>

                  </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                  <?php if($this->session->logged_in==TRUE){
                  ?>

                  <a class="dropdown-item" href="<?php echo base_url(); ?>usuario/login" style="font-size:15px !important;">
                   <i class="fas fa-shopping-basket"></i> Mis Compras
                  </a>

                  <a class="dropdown-item" href="<?php echo base_url(); ?>usuario/login" style="font-size:15px !important;">
                   <i class="far fa-id-badge"></i> Mi Perfil
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>usuario/cerrar_sesion" style="font-size:15px !important;">
                    <i class="far fa-times-circle"></i> Cerrar Sesión
                  </a>

                  <?php
                  }else{
                  ?>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>usuario/login" style="font-size:15px !important;">
                   Ingresar
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>usuario/registro" style="font-size:15px !important;">
                    Registrarte
                  </a>
                  <?php
                  }?>

                </div>
              </li>
              <li class="nav-item ctr">
                  <a class="nav-link" href="<?php echo base_url();?>tienda/cat"><i class="fas fa-list"></i> <span style="font-size:16px;;">Categorías</span></a>
              </li>

              <?php if($this->session->logged_in==TRUE){
              ?>
              <div class="upperLine"></div>
              <li class="nav-item ">
                  <a class="nav-link" href="#"><i class="far fa-heart"></i> <span style="font-size:16px" class="ctr">Favoritos</span></a>
              </li>
            <?php }?>


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
      <div class="container-fluid" id="blueNav" style="z-index:99;">
        <div class="row text-center" style="">
          <div class="col blueButton ccategory mc1" onclick="menuDown();">
            <div class="categorial " >
                <i class="fas fa-list hvr-icon"></i> Categorías
            </div>
          </div>
          <div class="col blueButton mc1"><a href="<?php echo $this->config->item('base_url');?>tienda/marcas" class="hvr-icon-bounce"> <i class="fas fa-award hvr-icon"></i> Marcas </a></div>
          <div class="col blueButton mc1" ><a href="<?php echo $this->config->item('base_url');?>producto/results/promociones/1/0"  class="hvr-icon-bounce"><i class="fas fa-star hvr-icon"></i> Promociones</a></div>
        </div>
      </div>

      <!-- Menu Categorias -->
      <div class="categoryContainer" style="z-index:50;">
        <div class="listCategory">
          <ul>
            <li class="categoryName" onclick="shown('1','Productos Escolares y de Oficina')"><div class="cleft"><i class="fas fa-calculator mleft"></i></div> Productos Escolares y de Oficina<i class="fas fa-chevron-right catChev"></i></li>
            <li class="categoryName" onclick="shown('2','Papel')" ><div class="cleft"><i class="fas fa-copy mleft"></i></div> Papel<i class="fas fa-chevron-right catChev"></i></li>
            <li class="categoryName" onclick="shown('3','Tintas y Toners')" ><div class="cleft"><i class="fas fa-tint mleft"></i></div> Tintas y Toners<i class="fas fa-chevron-right catChev"></i></li>
            <li class="categoryName" onclick="shown('4','Tecnología')" ><div class="cleft"><i class="fas fa-laptop mleft"></i></div> Tecnología<i class="fas fa-chevron-right catChev"></i></li>
            <li class="categoryName" onclick="shown('5','Accesorios')" ><div class="cleft"><i class="fas fa-mouse mleft"></i></div> Accesorios<i class="fas fa-chevron-right catChev"></i></li>
            <li class="categoryName" onclick="shown('6','Muebles')" ><div class="cleft"><i class="fas fa-chair mleft"></i></div> Muebles<i class="fas fa-chevron-right catChev"></i></li>
            <li class="categoryName" onclick="shown('7','Tlapalería')" ><div class="cleft"><i class="fas fa-tools mleft"></i></div> Tlapalería<i class="fas fa-chevron-right catChev"></i></li>
            <li class="categoryName" onclick="shown('8','Limpieza')" ><div class="cleft"><i class="fas fa-broom mleft"></i></div> Limpieza<i class="fas fa-chevron-right catChev"></i></li>
            <li class="categoryName" onclick="shown('9','Cafetería')" ><div class="cleft"><i class="fas fa-mug-hot mleft"></i></div> Cafetería<i class="fas fa-chevron-right catChev"></i></li>
          </ul>
        </div>

        <div class="subCategory">
          <ul id="subContainer">
          </ul>
        </div>

        <div class="subCategory2">
          <div class="menuCross" onclick="closeMenu();"><i class="fas fa-times"></i></div>
          <ul id="subContainer2">
          </ul>
        </div>
      </div>

    </header>
