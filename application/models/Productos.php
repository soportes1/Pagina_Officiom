<?php
////clase que proporciona a sus objetos metodos varios
class Productos extends CI_Model{

  ////consulta general
  public function inquery($sql){
     $query = $this->db->query($sql);
  	  return $query;
  }

  ///metodo que nos permite encontrar toda la informacion de un producto
  public function informacion_producto($id){
    $this->db->select('*, producto.id AS pid, producto.imagen AS img');
    $this->db->from('producto');
    $this->db->join('stock','stock.id_producto=producto.id');
    $this->db->join('marcas','marcas.id=producto.id_marca');
    $this->db->where('producto.id',$this->db->escape_str($id));
    $result = $this->db->get();
    return $result;
  }

  ///metodo que nos permite tener productos de un tipo de producto determinado
  public function productos_tipoproducto($tipoProducto){
    $this->db->select('*, producto.id AS pid, producto.imagen AS img');
    $this->db->from('producto');
    $this->db->join('stock','stock.id_producto=producto.id');
    $this->db->join('marcas','marcas.id=producto.id_marca');
    $this->db->where('id_tipoproducto',$tipoProducto);
    $result = $this->db->get();
    return $result;
  }

  ///meotodo que devulkve informacion para el carrito de compras
  public function floatcar_info($id){
    $this->db->select('producto,imagen,precio_principal,precio_principal2,precio_principal3');
    $this->db->from('producto');
    $this->db->where('id',$id);
    $result = $this->db->get();
    return $result;
  }



  ///metodo del modelo que nos permite verificar si existe una categoria por su id o nombre
  public function existe_categoria($categoria){
    $this->db->select('id');
    $this->db->from('categorias');
    $this->db->where('id',$categoria);
    $this->db->or_like('nombre',$categoria);
    $result = $this->db->get();
    if($result->num_rows()>0){
      return 1;
    }else{
      return 0;
    }
  }


  ///metodo del modelo que nos permite verificar si existe una categoria por su id o nombre
  public function existe_subcategoria($subcategoria){
    $this->db->select('id');
    $this->db->from('sub_categoria');
    $this->db->where('id',$subcategoria);
    $this->db->where('nivel',1);
    $result = $this->db->get();
    if($result->num_rows()>0){
      return 1;
    }else{
      return 0;
    }
  }///end of function

  ///metodo del modelo que nos permite verificar si existen tipos de productos
  public function existe_tipoProductos($tipos){
    $this->db->select('id');
    $this->db->from('sub_categoria');
    $this->db->where('id',$tipos);
    $this->db->where('nivel',2);
    $result = $this->db->get();
    if($result->num_rows()>0){
      return true;
    }else{
      return false;
    }
  }///end of function

  ////metodo que nos permite encontrar informacion de tipos de productos con los datos completos de su existencia
  public function items_data($tipoProducto,$filtro){
    $this->db->select('*, producto.id AS pid,producto.imagen AS img, marcas.id AS mid, marcas.imagen AS marcaimg');
    $this->db->from('producto');
    $this->db->join('stock','stock.id_producto = producto.id');
    $this->db->join('marcas','marcas.id = producto.id_marca');
    $this->db->where('id_tipoproducto',$tipoProducto);
    switch ($filtro) {
      case 'f0':
        $this->db->order_by("producto.id", "asc");
        break;

      case 'f1':
        $this->db->order_by("precio_principal", "asc");
        break;

      case 'f2':
        $this->db->order_by("precio_principal", "desc");
        break;

      case 'f3':
        $this->db->order_by("stock.stock", "desc");
        break;

      default:
        $this->db->order_by("producto.id", "asc");
        break;
    }


    /////agregar condicion para productos de gobierno
    $result = $this->db->get();
    return $result;
  }



}
