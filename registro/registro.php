<?php
	
	if(isset($_POST['submit'])){
		require_once('../includes/conexion.php');
		$nombre=isset($_POST['nombre'])? mysqli_real_escape_string($db,$_POST['nombre']) : false;
		$apellido=isset($_POST['apellido']) ? mysqli_real_escape_string($db,$_POST['apellido']) :false ;
		$email=isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
		$pass=isset($_POST['pass']) ? mysqli_real_escape_string($db,$_POST['pass']) : false;
	}
	$errores=[];
	//validar nombre
	if(!empty($nombre) && !is_numeric($nombre)&& !preg_match('/[0-9]/',$nombre)){
		$nombre_validado=true;	
	}
	else{
		$nombre_validado=false;	
		$errores['nombre']='El nombre no es valido';
	}
	//validar apellidos
	if(!empty($apellido) && !is_numeric($apellido)&& !preg_match('/[0-9]/',$apellido)){
		$apellido_validado=true;	
	}
	else{
		$apellido_validado=false;
		$errores['apellido']='El apellido no es valido';
	}
	//validar email
	if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
		$email_validado=true;
	}
	else{
		$email_validado=false;
		$errores['email']="Formato de email invalido";
	}
	// validar password
	if(!empty($pass)){
		
		$pass_validado=true;
		echo $pass;
		die();
	}
	else{
		$pass_validado=false;
		$errores['pass']="Campo requerido";
		echo var_dump($errores);
		echo var_dump($pass);
		die();
		
	}
	//insercion
	$guardar_usuario=false;
	if(count($errores)==0){
		$guardar_usuario=true;
		$password_segura=password_hash($pass,PASSWORD_BCRYPT,['COST'=>4]);
		$sql="INSERT INTO usuarios VALUES(null,'$nombre','$apellido','$email','$password_segura',CURDATE())";
		$guardar=mysqli_query($db,$sql);
		if($guardar){
			$_SESSION['completado']='Registro exitoso';
			echo'algo va bien';
		}
		else{
			$_SESSION['errores']['general']='Fallo al guardar datos';
		}
	}
	else{
		$_SESSION['errores']=$errores;
		
		
	}
	header('location:../index.php');
?>	