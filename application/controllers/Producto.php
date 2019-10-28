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
    }else{ $desde=1;}
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



      case 'busqueda':
        $this->busqueda();
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
        $top['position'] = 'CATEGORIAS / PRODUCTOS';
        $this->load->view('header',$data);
        $this->load->view('breadcrumb',$top);
        $this->load->view('productos/lateral',$data);
        $this->load->view('productos/listado_productos',$data);
        $this->load->view('footer',$data);
      }else{
        $this->erro('Ruta No Existente'); ///pantalla de error
      }
  }


  ///meotodo para mostar resultados de busquewda
  private function busqueda(){

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
