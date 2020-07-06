<?php
	//iniciar sesion
	require_once('../includes/conexion.php');
	// recoger datos formulario
	if(isset($_POST)){
		if(isset($_SESSION['error_login'])){
			session_unset($_SESSION['error_login']);
		}		
		$email=isset($_POST['email']) ? $_POST['email']: false;
		$password=isset($_POST['password']) ? $_POST['password']: false;	
		$sql="SELECT * FROM usuarios WHERE  email ='$email'";
		$login=mysqli_query($db,$sql);
		if($login && mysqli_num_rows($login)==1){
			$user=mysqli_fetch_assoc($login);
			$verify=password_verify($password,$user['password']);
			if($verify){
				$_SESSION['usuario']=$user;
			}
			else{
				$_SESSION['error_login']='Login incorrecto';
			}
		}
		else{
			$_SESSION['error_login']='Login incorrecto';
		}
	}
	header('location:../index.php');
	//comprobar contraseña
	//consulta para comprobar usuario
	//Sesion para datos de usuario logeado
	//fallo y errores
	//redirección
	
?>