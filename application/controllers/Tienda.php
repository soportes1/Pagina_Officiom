<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tienda extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Productos');
		$this->load->model('Users');
		$this->load->library('Apicall');
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
		$this->load->view('message');


	}

	public function getMenu(){
			$categoria = $_POST['id']; ///id de la categoria
			$sql = "SELECT id,nombre FROM sub_categoria WHERE id_padre=".$categoria." AND nivel=1";
			$result = $this->Productos->inquery($sql);
			$i=0; ///subcategoria
			////obtenemos las subcategorias
			foreach ($result->result() as $row) {
				$params[$i][0] = $row->id; ////asignamos el id de subcategoria al arreglo
				$params[$i][1] = $row->nombre;  ////asignamos el nombre de subcategoria al arreglo
				$i++;
			}
			echo json_encode($params);
	}

		public function getMenu2(){
			$categoria = $_POST['id']; ///id de la categoria
			$sql = "SELECT id,nombre FROM sub_categoria WHERE id_padre=".$categoria." AND nivel=2";
			$result = $this->Productos->inquery($sql);
			$i=0; ///subcategoria
			////obtenemos las subcategorias
			foreach ($result->result() as $row) {
				$params[$i][0] = $row->id; ////asignamos el id de subcategoria al arreglo
				$params[$i][1] = $row->nombre;  ////asignamos el nombre de subcategoria al arreglo
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

		$top['position'] = '<li class="breadcrumb-item">Marcas</li>';
		$this->load->view('header',$data);
		$this->load->view('breadcrumb',$top);
		$this->load->view('marcas',$data);
		$this->load->view('footer',$data);
	}


	///mostramos todas las categorias
	public function cat(){
		$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$top['position'] = ' <li class="breadcrumb-item link-unstyled">Categorías</li> ';
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

	////metodo que muestra los productos de un tipo de producto
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


	///metodo que muestra los productos de una categoria, y almacena en un array
	///las subcategorias y tipos de productos
	public function productosCategoria(){
		$categoria = $this->uri->segment(3);
		////busqueda de categorias o tipos de productos con paginacion
		if(isset($_GET['nivel']) AND($_GET['nivel']>0)){ ///obtenemos la busqueda
			$nivel = $_GET['nivel']; //tipo de producto
			$eproductos = $this->Productos->inquery("SELECT id FROM producto WHERE id_tipoproducto=".$categoria);
		}else{
			$nivel = 1; //categoria
			$eproductos = $this->Productos->inquery("SELECT id FROM producto WHERE id_categoria=".$categoria);
		}

		///paginas
		if(isset($_GET['page']) AND($_GET['page']!="") AND($_GET['page']>0)){ ///obtenemos la busqueda
			$page = $_GET['page']; //tipo de producto
		}else{
			$page = 1;
		}
		$data['cproductos'] = $eproductos->num_rows();
		$data['page'] = $page;
		$bufferPages = $data['cproductos']/12; ///cantidad de paginas
		$bufferPg = intval($bufferPages); ///parte entera
		$bufferRest = $bufferPages - $bufferPg;
		if($bufferRest>0){ ///se agrega una pagina
			$bufferPg++;
		}
		$data['paginas'] = $bufferPg; //// cantidad de paginas finales
		$inicio = (12*$page)-12;
		$fin = (12*$page);

		////filtro de ordenamiento
		if(isset($_GET['filtro']) AND($_GET['filtro']!="")){ ///obtenemos la busqueda
			$filtro = $_GET['filtro']; //tipo de producto
		}else{
			$filtro = 'f0';
		}

		///////verificmaos si tenemos productos
		if(isset($categoria) AND($categoria!="")){
			$existe = $this->Productos->existe_categoria($categoria);
			if($existe===1){
				////obtenemos todos los productos del modelo
				$data['productos'] = $this->Productos->items_category_data($categoria,$filtro,$nivel,$inicio,$fin);


				////obtenemos las marcas registradas
				$data['productos'] = $this->Productos->items_category_data($categoria,$filtro,$nivel,$inicio,$fin);



				///mostramos los productos
				$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
				$data['categorias'] = $this->Productos->inquery($sql);
				$top['position'] = 'Categorías';
				$this->load->view('header',$data);
				$this->load->view('breadcrumb',$top);
				$this->load->view('categorias/mostrar_categorias_productos',$data);
				$this->load->view('footer',$data);
			}else{
				$this->erro('Categoria No Existente');
			}
		}else{
			$this->erro('Categoria No Existente');
		}
	}///end of function



	///metodo que muestra los productos de una categoria, y almacena en un array
	///las subcategorias y tipos de productos
	public function productosMarca(){
		$categoria = $this->uri->segment(3);
		////busqueda de categorias o tipos de productos con paginacion
		if(isset($_GET['nivel']) AND($_GET['nivel']>0)){ ///obtenemos la busqueda
			$nivel = $_GET['nivel']; //tipo de producto
			$eproductos = $this->Productos->inquery("SELECT id FROM producto WHERE id_marca=".$categoria);
		}else{
			$nivel = 1; //categoria
			$eproductos = $this->Productos->inquery("SELECT id FROM producto WHERE id_marca=".$categoria);

		}

		///paginas
		if(isset($_GET['page']) AND($_GET['page']!="") AND($_GET['page']>0)){ ///obtenemos la busqueda
			$page = $_GET['page']; //tipo de producto
		}else{
			$page = 1;
		}
		$data['cproductos'] = $eproductos->num_rows();
		$data['page'] = $page;
		$bufferPages = $data['cproductos']/12; ///cantidad de paginas
		$bufferPg = intval($bufferPages); ///parte entera
		$bufferRest = $bufferPages - $bufferPg;
		if($bufferRest>0){ ///se agrega una pagina
			$bufferPg++;
		}
		$data['paginas'] = $bufferPg; //// cantidad de paginas finales
		$inicio = (12*$page)-12;
		$fin = (12*$page);

		////filtro de ordenamiento
		if(isset($_GET['filtro']) AND($_GET['filtro']!="")){ ///obtenemos la busqueda
			$filtro = $_GET['filtro']; //tipo de producto
		}else{
			$filtro = 'f0';
		}

		///////verificmaos si tenemos productos
		if(isset($categoria) AND($categoria!="")){
			$existe = $this->Productos->existe_categoria($categoria);
			if($existe===1){
				////obtenemos todos los productos del modelo
				$data['productos'] = $this->Productos->items_marcas_data($categoria,$filtro,$nivel,$inicio,$fin);
				///mostramos los productos
				$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
				$data['categorias'] = $this->Productos->inquery($sql);
				$top['position'] = 'Resultado de Búsqueda';
				$this->load->view('header',$data);
				$this->load->view('breadcrumb',$top);
				$this->load->view('categorias/mostrar_categorias_productos',$data);
				$this->load->view('footer',$data);
			}else{
				$this->erro('Categoria No Existente');
			}
		}else{
			$this->erro('Categoria No Existente');
		}
	}///end of function
	///metodo que muestra los productos de una categoria, y almacena en un array



	///metodo que muestra los productos con descuento
	public function productosDescuento(){
		$eproductos = $this->Productos->inquery("SELECT id FROM producto WHERE descuento=1");
		///paginas
		if(isset($_GET['page']) AND($_GET['page']!="") AND($_GET['page']>0)){ ///obtenemos la busqueda
			$page = $_GET['page']; //tipo de producto
		}else{
			$page = 1;
		}

		$data['cproductos'] = $eproductos->num_rows();
		$data['page'] = $page;
		$bufferPages = $data['cproductos']/12; ///cantidad de paginas
		$bufferPg = intval($bufferPages); ///parte entera
		$bufferRest = $bufferPages - $bufferPg;
		if($bufferRest>0){ ///se agrega una pagina
			$bufferPg++;
		}
		$data['paginas'] = $bufferPg; //// cantidad de paginas finales
		$inicio = (12*$page)-12;
		$fin = (12*$page);

		////filtro de ordenamiento
		if(isset($_GET['filtro']) AND($_GET['filtro']!="")){ ///obtenemos la busqueda
			$filtro = $_GET['filtro']; //tipo de producto
		}else{
			$filtro = 'f0';
		}
		///////verificmaos si tenemos productos
		////obtenemos todos los productos del modelo
		$data['productos'] = $this->Productos->productos_descuento($filtro,$inicio,$fin);
		///mostramos los productos
		$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$top['position'] = 'Productos con Descuento';
		$this->load->view('header',$data);
		$this->load->view('breadcrumb',$top);
		$this->load->view('productos/descuentos',$data);
		$this->load->view('footer',$data);
	}///end of function



	///metodo que muestra un producto de manera detallada
	public function producto(){
		$producto = $this->uri->segment(3);
		$pid = $producto;
		if(isset($producto) AND($producto!="")){
			//$query = "SELECT * FROM producto WHERE id=".$this->db->escape($producto);
			//$data['result'] = $this->Productos->inquery($query);
			$data['result'] = $this->Productos->informacion_producto($producto);
			$eresult = $data['result'];

			if($data['result']->num_rows()>0){
				///mostramos la vista
				$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
				$data['categorias'] = $this->Productos->inquery($sql);

				foreach ($eresult->result() as $value) {
					$producto = $value->producto;
				}


				$top['position'] = $this->apicall->miga_pan('producto',$pid); ///miga de pon

				$this->load->view('header',$data);
				$this->load->view('breadcrumb',$top);
				$this->load->view('productos/producto',$data);
				$this->load->view('footer');

			}else{
				$this->erro('Producto No Existente.');
			}
		}else{ ///redireccionamos a pagina de error
			$this->erro('Producto No Existente');
		}
	}

	////vista generica
	public function vista(){
		$vista = $this->uri->segment(3);
		$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$top['position'] = ' ';
		$this->load->view('header',$data);

		$this->load->view($vista,$data);
		$this->load->view('footer',$data);
	}



	public function contacto(){
		$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$top['position'] = ' ';
		$this->load->view('header',$data);
		$this->load->view('contacto',$data);
		$this->load->view('footer',$data);
	}

	public function aviso(){
		$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$top['position'] = ' ';
		$this->load->view('header',$data);
		$this->load->view('aviso_privacidad',$data);
		$this->load->view('footer',$data);

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
