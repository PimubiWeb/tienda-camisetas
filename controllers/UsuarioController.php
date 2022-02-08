<?php
require_once 'models/usuario.php';

class usuarioController{
	
	public function index(){
		echo "Controlador Usuarios, Acción index";
	}
	
	public function registro(){
		require_once 'views/usuario/registro.php';
	}
	
	public function save(){
		if(isset($_POST)){
			
			//si existe me devuelves el contenido del post sino me devulves false
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			

			//validacion de los datos introducidos
			if($nombre && $apellidos && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);

				$save = $usuario->save();
				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url.'usuario/registro');
	}
	
	public function login(){
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();
			
			//inicio de sesion con sesiones
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
				
				//para ver si es admin
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}
				
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		
		}
		header("Location:".base_url);
	}
	
	public function logout(){

		//si esta la sesion activa la cierro
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		//si esta la sesion activa de admin la cierro
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		//vuelvo al inicio
		header("Location:".base_url);
	}
	
} // fin de la clase