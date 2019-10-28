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
    $this->db->select('*, producto.id AS pid, producto.imagen AS img, producto.imagen_miniatura as thumb');
    $this->db->from('producto');
    $this->db->join('stock','stock.id_producto=producto.id');
    $this->db->join('marcas','marcas.id=producto.id_marca');
    $this->db->where('producto.id',$this->db->escape_str($id));
    $result = $this->db->get();
    return $result;
  }

  ///metodo que nos permite tener productos de un tipo de producto determinado
  public function productos_tipoproducto($tipoProducto){
    $this->db->select('*, producto.id AS pid, producto.imagen AS img, producto.imagen_miniatura AS thumb');
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
    $this->db->select('*, producto.id AS pid,producto.imagen AS img,producto.imagen_miniatura AS thumb, marcas.id AS mid, marcas.imagen AS marcaimg');
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

  ///metodo que nos permite encontrar los productos de una categoria

  public function items_category_data($categoria,$filtro,$nivel,$inicio,$fin){
    $this->db->select('*, producto.id AS pid,producto.imagen AS img, marcas.id AS mid, marcas.imagen AS marcaimg');
    $this->db->from('producto');
    $this->db->join('stock','stock.id_producto = producto.id');
    $this->db->join('marcas','marcas.id = producto.id_marca');
    if($nivel==1){ ///buscamos los productos de la categoria
      $this->db->where('id_categoria',$categoria);
    }else{ ///buscamos los productos del tipo de producto
      $this->db->where('id_tipoproducto',$nivel);
    }

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
    /////##agregar condicion para productos de gobierno
    $this->db->limit($fin,$inicio);
    $result = $this->db->get();
    return $result;
  }////end of function

  ////////////////////////////////////

  public function items_marcas_data($categoria,$filtro,$nivel,$inicio,$fin){
    $this->db->select('*, producto.id AS pid,producto.imagen AS img, marcas.id AS mid, marcas.imagen AS marcaimg');
    $this->db->from('producto');
    $this->db->join('stock','stock.id_producto = producto.id');
    $this->db->join('marcas','marcas.id = producto.id_marca');
    if($nivel==1){ ///buscamos los productos de la categoria
      $this->db->where('id_marca',$categoria);
    }else{ ///buscamos los productos del tipo de producto
      $this->db->where('id_marca',$categoria);
    }

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

    /////##agregar condicion para productos de gobierno
    $this->db->limit($fin,$inicio);
    $result = $this->db->get();
    return $result;
  }////end of function

  public function productos_descuento($filtro,$inicio,$fin){
    $this->db->select('*, producto.id AS pid,producto.imagen AS img,producto.imagen_miniatura as thumb, marcas.id AS mid, marcas.imagen AS marcaimg');
    $this->db->from('producto');
    $this->db->join('stock','stock.id_producto = producto.id');
    $this->db->join('marcas','marcas.id = producto.id_marca');
    $this->db->where('descuento','1');
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
    /////##agregar condicion para productos de gobierno
    $this->db->limit($fin,$inicio);
    $result = $this->db->get();
    return $result;
  }////end of function

  public function productos_masvendidos($filtro,$inicio,$fin){
    $this->db->select('*, producto.id AS pid,producto.imagen AS img,producto.imagen_miniatura as thumb, marcas.id AS mid, marcas.imagen AS marcaimg');
    $this->db->from('producto');
    $this->db->join('stock','stock.id_producto = producto.id');
    $this->db->join('marcas','marcas.id = producto.id_marca');
    $this->db->where('pagina_principal','1');
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
    /////##agregar condicion para productos de gobierno
    $this->db->limit($fin,$inicio);
    $result = $this->db->get();
    return $result;
  }////end of function

  /////////////////metodos v2.0

  ////metodo que nos permite obtener el ordenamiento en caso de existir
  private function ordenamiento($ordenamiento){
    switch ($ordenamiento) {
      case 'f0': ////sin ordenamiento, por id
        $this->db->order_by("producto.id", "asc");
        break;

      case 'f1': //// precio mas economico
        $this->db->order_by("precio_principal", "asc");
        break;


      case 'f2': ////precio mas caro
        $this->db->order_by("precio_principal", "desc");
        break;

      case 'f3': ///existencias de producto
        $this->db->order_by("stock.stock", "desc");
        break;

      default: ///sin ordenamiento
        $this->db->order_by("producto.id", "asc");
        break;
    }

  }

  ///metodo para seleccionar productos de acuerdo al tipo de busqueda
  public function resultados_productos($ordenamiento,$where,$inicio,$fin,$marca){
    /////constantes
    $this->db->select('*, producto.id AS pid,producto.imagen AS img, producto.imagen_miniatura AS thumb, marcas.id AS mid, marcas.imagen AS marcaimg');
    $this->db->from('producto');
    //$this->db->join('stock','stock.id_producto = producto.id');
    $this->db->join('marcas','marcas.id = producto.id_marca');
    ////fin de constantes
    ///variables de busqueda
    $this->ordenamiento($ordenamiento); /////en caso de existir un filtro de orden
    $this->db->where($where); ////condicion de busqueda
    if($marca!='null'){
      $this->db->where('marca',$marca);
    }
    $this->db->limit($fin,$inicio);
    ///fin de variables  de busqueda
    $result = $this->db->get();
    return $result;
  }


  ///metodo para encontrar todos los productos  para opaginacion y filtro de marca
  public function paginador($where,$marca){
    /////constantes
    $this->db->select('producto.id AS pid,marcas.marca');
    $this->db->from('producto');
    $this->db->join('marcas','marcas.id = producto.id_marca');
    $this->db->where($where);
    if($marca!='null'){
      $this->db->where('marca',$marca);
    }
    $result = $this->db->get();
    ////fin de constantes
    return $result;
  }





}
