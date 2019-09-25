<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Productos');
	}

	public function index()
	{
		$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$this->load->view('home',$data);
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
				$query = "SELECT id,nombre FROM sub_categoria WHERE id_padre=".$row->id." AND nivel=2";
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



}
