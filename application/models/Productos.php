<?php
////clase que proporciona a sus objetos metodos varios
class Productos extends CI_Model{

  public function inquery($sql){
     $query = $this->db->query($sql);
  	  return $query;
  }


}
