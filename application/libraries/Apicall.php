<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apicall{
	protected $CI;
	protected $ruta="../erp/shared_resources/";
	public function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
		$this->CI->load->library('session');
	}


	public function vapi(){
		return "Api Ver. 1.0";
	}


  /////metodo de redondeo preciso como excel
  public static function round_up($value, $places){
    $mult = pow(10, abs($places));
    return $places < 0 ?
    ceil($value / $mult) * $mult :
    ceil($value * $mult) / $mult;
  }


	public function get_categorias(){
		$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
		$result= $this->CI->Productos->inquery($sql);
		return $result;
	}

	///meotodo que calcula el precio con su mrgen dee utilidad y el iva
	public function calculator($precio1,$precio2,$precio3){
		$basePrice = max($precio1,$precio2,$precio3);
		$bufferAdd = $basePrice * 0.20;
		$tmpPrice = $bufferAdd + $basePrice; //precio final
		///agregamos el e iva
		$precio_final = $tmpPrice*1.16;
 		$precio_final =number_format($precio_final,2);
		return $precio_final;
	}

	////metodo que nos devuelve las rutas de las migas de pan
	public function miga_pan($localizacion, $param){
		$link = "";
		switch ($localizacion) {

			case 'producto':
			///obtenemos la subcategoria y categoria, tipo de producto y nombre del producto
			$sql = "SELECT producto,
			categorias.nombre AS categoria, categorias.id AS cid,
			subct.nombre AS subcategoria, subct.id AS sid,
			tp.nombre AS tipoproducto, tp.id AS tid
			FROM producto
			INNER JOIN categorias
			ON producto.id_categoria = categorias.id
			INNER JOIN sub_categoria subct
			ON producto.id_subcategoria = subct.id
			INNER JOIN sub_categoria tp
			ON producto.id_tipoproducto = tp.id
			WHERE producto.id=".$param;
			$result = $this->CI->Productos->inquery($sql);
			foreach($result->result() as $row) {
				$link .= '<li class="breadcrumb-item link-unstyled"><a style="color:#8D8D8D;" class="link-unstyled" href="'.base_url().'producto/results/categoria/'.$row->cid.'">'.$row->categoria.'</a></li>'; //// categoria
				$link .= '<li class="breadcrumb-item link-unstyled"><a style="color:#8D8D8D;" class="link-unstyled" href="'.base_url().'producto/results/subcategoria/'.$row->sid.'">'.$row->subcategoria.'</a></li>'; //// categoria
				$link .= '<li class="breadcrumb-item link-unstyled"><a style="color:#8D8D8D;" class="link-unstyled" href="'.base_url().'producto/results/tipo_producto/'.$row->tid.'">'.$row->tipoproducto.'</a></li>'; //// categoria
				$link .= '<li class="breadcrumb-item active" aria-current="page">'.$row->producto.'</li>'; //// tipo de producto
			}
			break;

			case 'marca':
				$sql = "SELECT marca FROM marcas WHERE id=".$param;
				$result = $this->CI->Productos->inquery($sql);
				foreach($result->result() as $row) {
					$link .= '<li class="breadcrumb-item link-unstyled">'.$row->marca.'</li>'; //// categoria
				}
			break;

			case 'categoria':
			///obtenemos la subcategoria y categoria
			$sql = "SELECT categorias.nombre AS category, categorias.id AS cid
			FROM categorias
			WHERE categorias.id=".$param;
			$result = $this->CI->Productos->inquery($sql);
			foreach($result->result() as $row) {
				$link .= '<li class="breadcrumb-item link-unstyled">'.$row->category.'</li>'; //// categoria
			}
			break;

			case 'subcategoria':
				///obtenemos la subcategoria y categoria
				$sql = "SELECT subc.nombre AS subcategory, subc.id AS sid,
				categorias.nombre AS category, categorias.id AS cid
				FROM sub_categoria subc
				INNER JOIN categorias
				ON subc.id_padre = categorias.id
				WHERE subc.nivel=1 AND subc.id=".$param;
				$result = $this->CI->Productos->inquery($sql);

				foreach($result->result() as $row) {
					$link .= '<li class="breadcrumb-item link-unstyled"><a style="color:#8D8D8D;" class="link-unstyled" href="'.base_url().'producto/results/categoria/'.$row->cid.'">'.$row->category.'</a></li>'; //// categoria
					$link .= '<li class="breadcrumb-item active" aria-current="page">'.$row->subcategory.'</li>'; //// tipo de producto
				}
			break;

			case 'tipo_producto':
				///obtenemos la subcategoria y categoria
				$sql = "SELECT tp.nombre AS tipoProducto, tp.id AS tid,
				subc.nombre AS subcategory, subc.id AS sid,
				categorias.nombre AS category, categorias.id AS cid
				FROM sub_categoria tp
				INNER JOIN sub_categoria subc
				ON tp.id_padre = subc.id
				INNER JOIN categorias
				ON subc.id_padre = categorias.id
				WHERE tp.nivel=2 AND tp.id=".$param;
				$result = $this->CI->Productos->inquery($sql);

				foreach($result->result() as $row) {
					$link .= '<li class="breadcrumb-item link-unstyled"><a style="color:#8D8D8D;" class="link-unstyled" href="'.base_url().'producto/results/categoria/'.$row->cid.'">'.$row->category.'</a></li>'; //// categoria
					$link .= '<li class="breadcrumb-item link-unstyled"><a style="color:#8D8D8D;" class="link-unstyled" href="'.base_url().'producto/results/subcategoria/'.$row->sid.'">'.$row->subcategory.'</a></li>'; //// categoria
					$link .= '<li class="breadcrumb-item active" aria-current="page">'.$row->tipoProducto.'</li>'; //// tipo de producto
				}
				break; ////fin de tipo de producto

			default:
					$link = "";
				break;
		} ///end of switch

		return $link; ///regresamos el string de la miga

	} ///end of function


}
