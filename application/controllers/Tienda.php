<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Productos');
	}

	public function index()
	{
		$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$this->load->view('header',$data);
		$this->load->view('home',$data);
		$this->load->view('footer',$data);
	}



	public function test(){
		$this->load->view('headerv2');

	}


	public function getMenu(){
			$categoria = $_POST['id']; ///id de la categoria
			$sql = "SELECT id,nombre FROM sub_categoria WHERE id_padre=".$categoria." AND nivel=1";
			$result = $this->Productos->inquery($sql);
			$i=0; ///subcategoria
			$j=0;

			foreach ($result->result() as $row) {
				$params[$i][$j][0] = $row->id; ////asignamos el id de subcategoria al arreglo
				$params[$i][$j][1] = $row->nombre;  ////asignamos el nombre de subcategoria al arreglo
				///obtenemos los tipos de productos
				$query = "SELECT id,nombre FROM sub_categoria WHERE id_padre=".$row->id." AND nivel=2 LIMIT 5";
				$rst = $this->Productos->inquery($query);
				foreach ($rst->result() as $arow){
					$j++;
					$params[$i][$j][0] = $arow->id; ////asignamos el id de subcategoria al arreglo
					$params[$i][$j][1] = $arow->nombre;  ////asignamos el nombre de subcategoria al arreglo

				}
				$j=0;
				$i++;
			}
			echo json_encode($params);
	}

	///metodo que llama a la vista de las marcas
	public function marcas(){
		////obtenemos todas las marcas
		$sql2 = "SELECT DISTINCT id,marca,imagen FROM marcas WHERE imagen!='../erp/shared_resources/images/noimage.png' AND activo=1";
		$data['result'] = $this->Productos->inquery($sql2); ///obtenemos todas las marcas disponibles con imagenes
		$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);

		$top['position'] = 'Marcas';
		$this->load->view('header',$data);
		$this->load->view('breadcrumb',$top);
		$this->load->view('marcas',$data);
		$this->load->view('footer',$data);
	}


	///mostramos todas las categorias
	public function cat(){
		$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$top['position'] = 'Categorías';
		$this->load->view('header',$data);
		$this->load->view('breadcrumb',$top);
		$this->load->view('categorias/mostrar_categorias',$data);
		$this->load->view('footer',$data);
	}

	///metodo para mostrar subcategorias y tipo de productos
	public function subct(){
		$categoria = $this->uri->segment(3);
		///verificamos si existe el id de la categoria
		$existe = $this->Productos->existe_categoria($categoria);
		if($existe>0){
			///buscamos las subcategorias de la categoria
			$sql = "SELECT id,nombre FROM sub_categoria WHERE id_padre=".$categoria." AND nivel=1";
			$subCategorias = $this->Productos->inquery($sql);
			$i=0;
			$j=0;
			foreach ($subCategorias->result() as $row) {
				$subs[$i][0] = $row->id; ///id subcategoria
				$subs[$i][1] = $row->nombre; ///nombre subcategoria
				//obtenemos los tipos de productos
				$query = "SELECT id,nombre FROM sub_categoria WHERE id_padre=".$subs[$i][0]." AND nivel=2";
				$tipoProd = $this->Productos->inquery($query);
				foreach($tipoProd->result_array() as $eval) {
					$tep[$i][$j][0] = $eval['id']; ///id tipo de producto
					$tep[$i][$j][1] = $eval['nombre'];
					$j++;
				}//end internal foreach
				$j=0;
				$i++;
			}///end principal foreach
			/////cargamos la vista
			$data['subcategorias'] = $subs;
			$data['tep'] = $tep;
			$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
			$data['categorias'] = $this->Productos->inquery($sql);
			$top['position'] = 'Categorías';
			$this->load->view('header',$data);
			$this->load->view('breadcrumb',$top);
			$this->load->view('categorias/mostrar_subcategorias',$data);
			$this->load->view('footer',$data);

		}else{
			$this->erro('Categoría No Existente');
		}
	} //end of function



	public function subcategorias(){
		$tipoProducto = $this->uri->segment(3);
		////obtenemos todos los productos del tipo de producto
		$data['result'] = $this->Productos->productos_tipoproducto($tipoProducto);
		////cargamos la vista
		$top['position'] = 'Tipo de Producto';
		$this->load->view('header',$data);
		$this->load->view('breadcrumb',$top);
		$this->load->view('tipo_producto',$data);
		$this->load->view('footer',$data);
	}


	public function tipoproductos(){
		$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);

		if(isset($_GET['filtro']) AND($_GET['filtro']!="")){
			$filtro = $_GET['filtro'];
		}else{
			$filtro = 0;
		}

		$tipoProducto = $this->uri->segment(3);
		////obtenemos todos los productos del tipo de producto
		if($tipoProducto!="" AND($tipoProducto!="null")){
			///VERIFICAMOS QUE EXISTAN LOS TIPOS DE PRODUCTOS
			$existe = $this->Productos->existe_tipoProductos($tipoProducto);
			if($existe===true){
				////obtenemos tods los productos del tipo de producto en especifico
				$data['productos'] = $this->Productos->items_data($tipoProducto,$filtro);
				////cargamos la vista
				$top['position'] = 'Tipo de Producto';
				$this->load->view('header',$data);
				$this->load->view('breadcrumb',$top);
				$this->load->view('tipo_producto',$data);
				$this->load->view('footer',$data);

			}else{ ///no existe el tipo de producto
				$this->erro('Categoría No Existente');
			}
		}else{
			$this->erro('Ruta No Valida');
		}
	}///end of function



	public function producto(){
		$producto = $this->uri->segment(3);
		if(isset($producto) AND($producto!="")){
			//$query = "SELECT * FROM producto WHERE id=".$this->db->escape($producto);
			//$data['result'] = $this->Productos->inquery($query);
			$data['result'] = $this->Productos->informacion_producto($producto);
			if($data['result']->num_rows()>0){
				///mostramos la vista
				$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
				$data['categorias'] = $this->Productos->inquery($sql);

				$top['position'] = 'producto'; ////
				$this->load->view('header',$data);
				$this->load->view('breadcrumb',$top);
				$this->load->view('producto',$data);
				$this->load->view('footer');

			}else{
				$this->erro('Producto No Existente');
			}
		}else{ ///redireccionamos a pagina de error
			$this->erro('Producto No Existente');
		}
	}

	///metodo para desplegar mensajes de error
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
}
