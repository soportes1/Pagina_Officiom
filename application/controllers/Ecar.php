<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*Clase orientada a procesar peticiones del carrito de compras
*mediante llamdas de Ajax, post, etc
*
*Contiene las vistas del carrito y finalizacion de las ordenes de compra
*
*Mediante este controlador verificamos los pedidos, y en caso de no contar con Stock
*de un producto determinado realiza la llamada a una orden sobre pedido
*
*
*/

class Ecar extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Productos');
    $this->load->library('session');
		$this->load->library('Apicall');

	}

  ////metodo que agrega un producto al carrito de compras mediante peticion de ajax
  public function addToCart(){
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
		////verificamos que exista la session del carrito
		if($this->session->userdata('ecar')){

			$ecar = unserialize($this->session->userdata('ecar')); ///obtenemos el array del ecar

			///verificamos si existe el producto en el carrito
			if(array_key_exists($id_producto,$ecar)){ ///actualizamos el valor del del producto
				$ecar[$id_producto] = $cantidad;
			}else{ ///agregamos el nuevo valor al array
				$ecar += array($id_producto =>$cantidad);
			}
			$this->session->set_userdata('ecar',serialize($ecar));

	 	}else{ ////si no existe el carrito de compras creamos la nueva session
				$itms = array($id_producto =>$cantidad);
				$this->session->set_userdata('ecar',serialize($itms));
		}

		echo 1;
  } ////end of function


  /////Test function
  public function ses(){
    $ecar = unserialize($this->session->userdata('ecar'));
		echo count($ecar);
		print_r($ecar);
  }

	///metodo que nos devuelve la cantidad de productos en el carrito
	public function countEcar(){
		if($this->session->userdata('ecar')){
			$ecar = unserialize($this->session->userdata('ecar')); ///obtenemos el array del ecar
			echo count($ecar);
		}else{ ///si no existe la session se devuelven 0 productos
			echo 0;
		}
	}

	///metodo que elimina un producto del carrito
	public function remove_item(){
		$id_producto = $_POST['id_producto'];
		$ecar = unserialize($this->session->userdata('ecar'));
		unset($ecar[$id_producto]);
		$this->session->set_userdata('ecar',serialize($ecar));
	}

	///metodfo para mostrar el modal del carrito de compras
	public function floatDisplay(){
		if($this->session->userdata('ecar')){
			$ecar = unserialize($this->session->userdata('ecar'));
			////recorremos todos los productos del carrito para obtener su informacion
			foreach ($ecar as $key => $value){///key=id, value=cantidad
				$result = $this->Productos->floatcar_info($key);
				foreach ($result->result() as $row) {
					$nombre = $row->nombre;
					$imagen = $row->imagen;
					////obtenemos el precio mas alto

				}

			}
		}
		echo 0;
	}

	////metodo que nos permite hacer el calculo del carrito de compras
	public function	recalEcar(){
	}

	public function ecarResume(){
		////obtenemos toda la informacion de productos del carrito de compras
		if($this->session->userdata('ecar')){
			$ecar = unserialize($this->session->userdata('ecar'));
			if(isset($ecar) AND(count($ecar)>0)){
				////obtenemos el resumen del pedido asi como el total
				$data['productos'] = $ecar;
				////
				/////mostramos el resumen del carrito producto a producto
				$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
				$data['categorias'] = $this->Productos->inquery($sql);
				$top['position'] = 'Resúmen de pedido';
				$this->load->view('header',$data);
				$this->load->view('breadcrumb',$top);
				$this->load->view('ecar/ecar_resume',$data);
				$this->load->view('footer');
			}else{
				$this->erro('Carrito de Compras Vacío');
			}
		}else{
			$this->erro('Carrito de Compras Vacío');
		}
	}

  ////metodo para eliminar la session del carrito
  public function emptyCar(){
    $this->session->sess_destroy();
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


}///end of class
