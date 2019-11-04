<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Productos');
		$this->load->model('Users');
		$this->load->library('Apicall');
	}

  public function index(){

    if($this->session->logged_in==TRUE){
      $this->logedin();
    }else{
      $this->login();
    }

  }

////////VISTAS DEL USUARIO

	public function login(){
		if($this->session->logged_in==TRUE){
			$this->logedin();
		}else{
		/////verificamos si tenemos los datos de acceso de inicio de session
		$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$top['position'] = ' / Iniciar Sesión';
		$this->load->view('header',$data);
		$this->load->view('breadcrumb',$top);
		$this->load->view('users/login',$data);
		$this->load->view('footer',$data);	
		}

	}


  ///metodo que renderiza la vista para registrar nuevos usuarios
	public function registro(){
		////verificamos la session
		$sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
		$data['categorias'] = $this->Productos->inquery($sql);
		$top['position'] = ' / Registrarte';
		$this->load->view('header',$data);
		$this->load->view('breadcrumb',$top);
		$this->load->view('users/register',$data);
		$this->load->view('footer',$data);
	}


  ///pantalla principal de usuario/cliente
  public function logedin(){
    if($this->session->logged_in==TRUE){
      $sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
      $data['categorias'] = $this->Productos->inquery($sql);
      $top['position'] = ' / Zona de Clientes';
      $this->load->view('header',$data);
      $this->load->view('breadcrumb',$top);
      $this->load->view('users/home',$data);
      $this->load->view('footer',$data);
    }else{
      $this->login();
    }
  }


/////////////##FUNCIONES DEL usuario

  ////procesador de usuarios nuevos
  public function agregar_usuario(){
    if(isset($_POST['registro']) AND($_POST['registro']==1)){
      $result = $this->new_user_register();
      if($result>0){ ///se creo el usuario y se tienen sessiones
        $this->logedin(); ///redireccionamos  pantalla de inicio de session
      }else{ ///no se creo el usuario
        switch ($result) {
          case -1: ///usuario existente
            $data['erro'] = "Usuario existente en el sistema";
            break;

            case 0: //error al insertar el usuario a la base
              $data['erro'] = "Error al registrar la cuenta. Contacte a un asesor.";
              break;

          default: /// error desconocido
            $data['erro'] = "Error al registrar la cuenta. Contacte a un asesor.";
            break;
        }

        $sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
    		$data['categorias'] = $this->Productos->inquery($sql);
    		$top['position'] = ' / Registrarte';
    		$this->load->view('header',$data);
    		$this->load->view('breadcrumb',$top);
    		$this->load->view('users/register',$data);
    		$this->load->view('footer',$data);
      }
    }////end of if

  }


	////metodo que nos permite agregar un nuevo usuario a la tienda
	private function new_user_register(){
		////obtenemos los datos de usuario
		$user = array(
			'nombre' => $_POST['nombre'],
			'apellidos' => $_POST['apellidos'],
			'telefono' => $_POST['telefono'],
			'email' => $_POST['email'],
      'contraseña' => $_POST['password'],
			'direccion' => $_POST['direccion']
		);

    ///verificamos la existencia previa del usuario en el sistema
    $existe = $this->Users->user_exist($_POST['email']);
    if($existe==false){
      ///agregamos los datos del usuario a la tienda
  		$result = $this->Users->add_user($user);
  		if($result>0){///inicioamos session con los nuevos datos de usuario
  			$newdata = array(
  			        'email'     => $_POST['email'], ////correo del usuario
  			        'logged_in' => TRUE ///session iniciada
  			);
  			$this->session->set_userdata($newdata); //creamos la session del usuario
  			return 1; //
  		}else{ ////error al re
  			return $result;
  		}
    }else{
      return -1;
    }
	}///end of function


  ///metodo que controla el ingreso de usuarios
  public function ingresar(){
    if(isset($_POST['registro']) AND($_POST['registro']==1)){
      ////verifiamos qie exista el correo
      $result = $this->validate_user(); ////validamos el usuario
      if($result>0){
        $this->logedin();
      }else{
        switch ($result) {
          case -1: ///usuario inexistente
            $data['erro'] = "Usuario no existente en el sistema.";
            break;

            case 0: //error al insertar el usuario a la base
              $data['erro'] = "Usuario/contraseña Incorrecta.";
              break;

          default: /// error desconocido
            $data['erro'] = "Error al ingresar. Contacte a un asesor.";
            break;
        }

        $sql = "SELECT id,nombre,imagen FROM categorias WHERE activo = 1 ORDER BY id asc";
        $data['categorias'] = $this->Productos->inquery($sql);
        $top['position'] = ' / Iniciar Sesión';
        $this->load->view('header',$data);
        $this->load->view('breadcrumb',$top);
        $this->load->view('users/login',$data);
        $this->load->view('footer',$data);
      }////
    }else{ ////inicio de session desde el carrito de compras valor 2
			$result = $this->validate_user(); ////validamos el usuario
			if($result>0){ ///si el  resultado es true, redireccionamos/recargamos la pagina la pagina
				$data['erro'] = 1; ///inicio de sesion correcto
			}else{///mostramos el error en el resumen de compra
				switch ($result) {
          case -1: ///usuario inexistente
            $data['erro'] = "Usuario no existente en el sistema.";
            break;

            case 0: //contrasena incorrecta
              $data['erro'] = "Usuario/contraseña Incorrecta.";
              break;

          default: /// error desconocido
            $data['erro'] = "Error al ingresar. Contacte a un asesor.";
            break;
        }
			}///fin de validacion de usuario
			$ecar = unserialize($this->session->userdata('ecar'));
			$data['productos'] = $ecar;

			$sql = "SELECT id,nombre FROM categorias WHERE activo = 1 ORDER BY id asc";
			$data['categorias'] = $this->Productos->inquery($sql);
			$top['position'] = '<li class="breadcrumb-item active" aria-current="page">Resúmen de pedido</li>';
			$this->load->view('header',$data);
			$this->load->view('breadcrumb',$top);
			$this->load->view('ecar/ecar_resume',$data);
			$this->load->view('footer');

		}////end of if
  }


  ///metodo que nos ayuda a validar el inicio de session de un usuario
  //requiere una llamada al modelo
	public function validate_user(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    ///verificamos que exista el usuario
    $existe = $this->Users->user_exist($_POST['email']);
    if($existe==true){
      $ingreso = $this->Users->validate_user($email,$password);
      if($ingreso==1){
        $newdata = array(
  			        'email'     => $_POST['email'], ////correo del usuario
  			        'logged_in' => TRUE ///session iniciada
  			);
  			$this->session->set_userdata($newdata); //creamos la session del usuario
  			return 1; // inicio de session correcto
      }else{
        return 0; ////usuario y/o contraseña incorrecta
      }
    }else{
      return -1;///usuario inexistente
    }
	}


  ///metodo para cerrar session de usuario
  public function cerrar_sesion(){
    $array_items = array('email','logged_in');
    $this->session->unset_userdata($array_items);
    $this->index();
  }

}///end of class
