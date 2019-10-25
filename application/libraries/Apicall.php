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



}
