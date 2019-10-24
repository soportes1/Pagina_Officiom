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


  ////metodo para eliminar la session del carrito
  public function emptyCar(){
    $this->session->sess_destroy();
  }



}///end of class
