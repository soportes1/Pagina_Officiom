<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
  public function __construct() {
		parent::__construct();
		$this->load->model('Productos');
    $this->load->library('pagination');
    $this->load->library('Apicall');
	}

  public function index(){
    echo 'cargar error';
  }



  ///metodo principal para gestinar listados de productos
  public function results(){
    $tipo_listado = $this->uri->segment(3);
    $param = $this->uri->segment(4);
    $pagina = $this->uri->segment(5);
    if(isset($pagina) AND($pagina!="")){
      $desde = $this->uri->segment(5);
    }else{ $desde=0;}


    /////VERIFICAMOS ORDENAMIENTO
    if(isset($_GET['filtro']) AND($_GET['filtro']!="")){ ///obtenemos la busqueda
			$ordenamiento = $_GET['filtro']; //tipo de producto
		}else{
			$ordenamiento = 'f0';
		}
    //////FIN DE ORDENAMIENTO
    /////verificamos si se tiene una marca
    if(isset($_GET['marca']) AND($_GET['marca']!="")){ ///obtenemos la busqueda
			$marca = $_GET['marca']; //tipo de producto
		}else{
			$marca = 'null'; ///sin filtro de marca
		}

    /*#####CONFIGURACION DE PAGINADOR YO*/
    $opciones = array();
    $opciones['per_page'] = 16;
    $opciones['reuse_query_string'] = true;
    $opciones['num_links'] = 4;
    $opciones['full_tag_open'] = '<ul class="pagination justify-content-center pagination-sm">';
    $opciones['full_tag_close'] = '</ul>';
    $opciones['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    $opciones['next_tag_close'] = '</span></li>';
    $opciones['last_tag_open'] = '<li class="page-item"><span class="page-link">';
    $opciones['last_tag_close'] = '</span></li>';
    $opciones['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    $opciones['prev_tag_close'] = '</span></li>';
    $opciones['first_tag_open'] = '<li class="page-item"><span class="page-link">';
    $opciones['first_tag_close'] = '</span></li>';
    $opciones['last_link'] = 'Última';
    $opciones['first_link'] = 'Primera';
    $opciones['next_link'] = '<i class="fas fa-chevron-right"></i>';
    $opciones['prev_link'] = '<i class="fas fa-chevron-left"></i>';
    $opciones['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $opciones['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
    $opciones['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    $opciones['num_tag_close'] = '</span></li>';
    /*Fin de configuracion del paginador*/

    /////////
    switch ($tipo_listado) {
      case 'categoria':
        $this->categoria($param,$desde,$ordenamiento,$marca,$opciones);
        break;

      case 'subcategoria':
        $this->sub_categoria($param,$desde,$ordenamiento,$marca,$opciones);
        break;

      case 'tipo_producto':
        $this->tipo_producto($param,$desde,$ordenamiento,$marca,$opciones);
        break;

      case 'marca':
        $this->marca($param,$desde,$ordenamiento,$marca,$opciones);
        break;

      case 'promociones':
        $this->promociones($param,$desde,$ordenamiento,$marca,$opciones);
        break;


      case 'busqueda': ///BUSQUEDA generica
        $param = $_GET['busqueda'];

        $this->busqueda($param,$desde,$ordenamiento,$marca,$opciones);
      break;


      default: /////mostramos la pantalla de error
        //////PANTALLA DE ERROR
        $this->erro('Ruta No Existente');
        break;
    }
  }




  ///meotodo para mostar resultados de categoria
  private function categoria($param,$desde,$ordenamiento,$marca,$opciones){
    if(isset($param) AND($param!="")){
      $where = "id_categoria=".$param;
      ////obtenemos las marcas y cantidad de resultados
      $paginador =$this->Productos->paginador($where,$marca);
      $marcas = [];
      foreach($paginador->result() as $row){
        $tmpBuffer = $row->marca;
        if (!in_array($tmpBuffer, $marcas)) {
            array_push($marcas,$tmpBuffer);
        }
      }
      $data['marcas'] = $marcas;
      ///paginacion y vista
      $opciones['total_rows'] = $paginador->num_rows(); ///total de productos
      $data['cantidad_resultados'] = $opciones['total_rows'];
      $opciones['base_url'] = base_url().'producto/results/categoria/'.$param;
      $data['productos'] = $this->Productos->resultados_productos($ordenamiento,$where,$desde,$opciones['per_page'],$marca);
      $this->pagination->initialize($opciones);
      /////cargamos la vista
      $data['categorias'] = $this->apicall->get_categorias(); ////categorias para la cabecera

      $top['position'] = $this->apicall->miga_pan('categoria',$param); ///miga de pon

      $this->load->view('header',$data);
      $this->load->view('breadcrumb',$top);
      $this->load->view('productos/lateral',$data);
      $this->load->view('productos/listado_productos',$data);
      $this->load->view('footer',$data);
    }else{
      $this->erro('Ruta No Existente'); ///pantalla de error
    }
  }

  ///meotodo para mostar resultados de subcategoria
  private function sub_categoria($param,$desde,$ordenamiento,$marca,$opciones){
    if(isset($param) AND($param!="")){
      $where = "id_subcategoria=".$param;
      ////obtenemos las marcas y cantidad de resultados
      $paginador =$this->Productos->paginador($where,$marca);
      $marcas = [];
      foreach($paginador->result() as $row){
        $tmpBuffer = $row->marca;
        if (!in_array($tmpBuffer, $marcas)) {
            array_push($marcas,$tmpBuffer);
        }
      }
      $data['marcas'] = $marcas;
      ///paginacion y vista

      $opciones['total_rows'] = $paginador->num_rows(); ///total de productos
      $data['cantidad_resultados'] = $opciones['total_rows'];
      $opciones['base_url'] = base_url().'producto/results/subcategoria/'.$param;
      $data['productos'] = $this->Productos->resultados_productos($ordenamiento,$where,$desde,$opciones['per_page'],$marca);
      $this->pagination->initialize($opciones);
      /////cargamos la vista
      $data['categorias'] = $this->apicall->get_categorias(); ////categorias para la cabecera
      $top['position'] = $this->apicall->miga_pan('subcategoria',$param); ///miga de pon
      $this->load->view('header',$data);
      $this->load->view('breadcrumb',$top);
      $this->load->view('productos/lateral',$data);
      $this->load->view('productos/listado_productos',$data);
      $this->load->view('footer',$data);
    }else{
      $this->erro('Ruta No Existente'); ///pantalla de error
    }
  }

  ///meotodo para mostar resultados de tipo de producto
  private function tipo_producto($param,$desde,$ordenamiento,$marca,$opciones){
    if(isset($param) AND($param!="")){
      $where = "id_tipoproducto=".$param;
      ////obtenemos las marcas y cantidad de resultados
      $paginador =$this->Productos->paginador($where,$marca);
      $marcas = [];
      foreach($paginador->result() as $row){
        $tmpBuffer = $row->marca;
        if (!in_array($tmpBuffer, $marcas)) {
            array_push($marcas,$tmpBuffer);
        }
      }
      $data['marcas'] = $marcas;
      ///paginacion y vista
      $opciones['total_rows'] = $paginador->num_rows(); ///total de productos
      $data['cantidad_resultados'] = $opciones['total_rows'];
      $opciones['base_url'] = base_url().'producto/results/tipo_producto/'.$param;
      $data['productos'] = $this->Productos->resultados_productos($ordenamiento,$where,$desde,$opciones['per_page'],$marca);

      $this->pagination->initialize($opciones);
      /////cargamos la vista
      $data['categorias'] = $this->apicall->get_categorias(); ////categorias para la cabecera
      $top['position'] = $this->apicall->miga_pan('tipo_producto',$param); ///miga de pon

      $this->load->view('header',$data);
      $this->load->view('breadcrumb',$top);
      $this->load->view('productos/lateral',$data);
      $this->load->view('productos/listado_productos',$data);
      $this->load->view('footer',$data);
    }else{
      $this->erro('Ruta No Existente'); ///pantalla de error
    }
  }

  ///meotodo para mostar resultados de una marca
  private function marca($param,$desde,$ordenamiento,$marca,$opciones){
      if(isset($param) AND($param!="")){
        $where = "id_marca=".$param;
        ////obtenemos las marcas y cantidad de resultados
        $paginador =$this->Productos->paginador($where,$marca);
        $marcas = [];
        foreach($paginador->result() as $row){
          $tmpBuffer = $row->marca;
          if (!in_array($tmpBuffer, $marcas)) {
              array_push($marcas,$tmpBuffer);
          }
        }
        $data['marcas'] = $marcas;
        ///paginacion y vista
        $opciones['total_rows'] = $paginador->num_rows(); ///total de productos
        $data['cantidad_resultados'] = $opciones['total_rows'];
        $opciones['base_url'] = base_url().'producto/results/marca/'.$param;
        $data['productos'] = $this->Productos->resultados_productos($ordenamiento,$where,$desde,$opciones['per_page'],$marca);
        $this->pagination->initialize($opciones);
        /////cargamos la vista
        $data['categorias'] = $this->apicall->get_categorias(); ////categorias para la cabecera
        $top['position'] = $this->apicall->miga_pan('marca',$param); ///miga de pon
        $this->load->view('header',$data);
        $this->load->view('breadcrumb',$top);
        $this->load->view('productos/lateral',$data);
        $this->load->view('productos/listado_productos',$data);
        $this->load->view('footer',$data);
      }else{
        $this->erro('Ruta No Existente'); ///pantalla de error
      }
  }

  ///meotodo para mostar productos con promociones
  private function promociones($param,$desde,$ordenamiento,$marca,$opciones){
      if(isset($param) AND($param!="")){
        $where = "descuento=1";
        ////obtenemos las marcas y cantidad de resultados
        $paginador =$this->Productos->paginador($where,$marca);
        $marcas = [];
        foreach($paginador->result() as $row){
          $tmpBuffer = $row->marca;
          if (!in_array($tmpBuffer, $marcas)) {
              array_push($marcas,$tmpBuffer);
          }
        }
        $data['marcas'] = $marcas;
        ///paginacion y vista
        $opciones['total_rows'] = $paginador->num_rows(); ///total de productos
        $data['cantidad_resultados'] = $opciones['total_rows'];
        $opciones['base_url'] = base_url().'producto/results/marca/'.$param;
        $data['productos'] = $this->Productos->resultados_productos($ordenamiento,$where,$desde,$opciones['per_page'],$marca);
        $this->pagination->initialize($opciones);
        /////cargamos la vista
        $data['categorias'] = $this->apicall->get_categorias(); ////categorias para la cabecera
        $top['position'] = '<li class="breadcrumb-item link-unstyled">PROMOCIONES</li>';
        $this->load->view('header',$data);
        $this->load->view('breadcrumb',$top);
        $this->load->view('productos/lateral',$data);
        $this->load->view('productos/listado_productos',$data);
        $this->load->view('footer',$data);
      }else{
        $this->erro('Ruta No Existente'); ///pantalla de error
      }
  }






  ///metodo para mostar resultados de busquewda
  private function busqueda($param,$desde,$ordenamiento,$marca,$opciones){
    if(isset($param) AND($param!="")){
      /////INICIA MOTOR DE BUSQUEDA
      $oracion = explode(" ",$param); //// DIVIDIMOS LA PALABRA DE BUSQUEDA ENTRE LOS ESPACIOS
      if(count($oracion)>1){//mas de una palabra en la busqueda
        $bufferSearch = ""; ///inicializamos nuestro buffer de carga
        $bufferSearch2 = ""; ///inicializamos nuestro buffer de carga
        $bufferSearch3 = ""; ///inicializamos nuestro buffer de carga
        $bufferSearch4 = ""; ///inicializamos nuestro buffer de carga
        for($mem=0;$mem<count($oracion);$mem++){
          if($mem>0){
            $bufferSearch .= " AND ";
            $bufferSearch2 .= " AND ";
            $bufferSearch3 .= " AND ";
            $bufferSearch4 .= " AND ";
          }
          $bufferSearch .= "soundex_match('".$oracion[$mem]."', producto.descripcion, ' ')"; ///buscamos en la descripcion del producto
          $bufferSearch2 .= "soundex_match('".$oracion[$mem]."', producto.producto, ' ')"; ///buscamos en el nombre corto del producto
          $bufferSearch3 .= "producto.descripcion LIKE '%".$oracion[$mem]."%'";
          $bufferSearch4 .= "producto.producto LIKE '%".$oracion[$mem]."%'";
        }
          $where = 'producto.activo > -1 AND('.$bufferSearch.') OR('.$bufferSearch2.') OR('.$bufferSearch3.') OR('.$bufferSearch4.')';
      }else{
        if(is_numeric($param)){
            $query = 'producto.activo > -1 AND(producto.id='.$param.') OR (sku="'.$param.'") OR (sku_proveedor="'.$param.'") ';
          }else{///////si la busqeda no es numerica realizamos la busqueda por palabra
            $lstStrn = substr($param,-1);
            if($lstStrn=='s'){///verifiamos si tenemos s al final
              $buscar2 = substr($param,0,-1);
              $adder2 = ' OR MATCH(descripcion,producto) AGAINST("'.$buscar2.'")';
            }else{
              $adder2="";
            }
            $where = 'producto.activo > -1 AND(producto LIKE "'.$param.'%" OR sku="'.$param.'" OR clave_interna LIKE "%'.$param.'%" OR descripcion LIKE "'.$param.'%" OR MATCH(producto) AGAINST("'.$param.'"IN NATURAL LANGUAGE MODE)'.$adder2.')';

            //$where = 'producto.activo > -1 AND(producto LIKE "%'.$param.'%" OR producto LIKE "%'.$param.'%" OR  sku="'.$param.'" OR clave_interna LIKE "%'.$param.'%" OR descripcion LIKE "%'.$param.'%" OR MATCH(producto,descripcion) AGAINST("'.$param.'"IN NATURAL LANGUAGE MODE)'.$adder2.')';
          }
      }
      ///////FIN DEL MOTOR DE BUSQUEDA, DEVUELVE VARIABLE WHERE

      ////obtenemos las marcas y cantidad de resultados
      $paginador =$this->Productos->paginador($where,$marca);
      $marcas = [];
      foreach($paginador->result() as $row){
        $tmpBuffer = $row->marca;
        if (!in_array($tmpBuffer, $marcas)) {
            array_push($marcas,$tmpBuffer);
        }
      }
      $data['marcas'] = $marcas;
      ///paginacion y vista
      $opciones['total_rows'] = $paginador->num_rows(); ///total de productos
      $data['cantidad_resultados'] = $opciones['total_rows'];
      $opciones['base_url'] = base_url().'producto/results/busqueda/'.$param;

      $data['productos'] = $this->Productos->resultados_productos($ordenamiento,$where,$desde,$opciones['per_page'],$marca);

      $data['productos']->num_rows();


      $this->pagination->initialize($opciones);
      /////cargamos la vista
      $data['categorias'] = $this->apicall->get_categorias(); ////categorias para la cabecera
      $top['position'] = '<li class="breadcrumb-item"> Resultado de Búsqueda</li>';
      $this->load->view('header',$data);
      $this->load->view('breadcrumb',$top);
      $this->load->view('productos/lateral',$data);
      $this->load->view('productos/listado_productos',$data);
      $this->load->view('footer',$data);
    }else{
      $this->erro('Ruta No Existente'); ///pantalla de erro
    }
  }

  ///////
  ////metodo para mostara errores
  public function erro($mensaje){
    $sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
    $data['categorias'] = $this->Productos->inquery($sql);
    $top['position'] = 'Error';
    $error['erro'] = $mensaje;
    $this->load->view('header',$data);
    $this->load->view('breadcrumb',$top);
    $this->load->view('erro',$error);
    $this->load->view('footer');
  }

}//end of class
