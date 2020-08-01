<?php
	
	if(isset($_POST['submit'])){
		require_once('../includes/conexion.php');
		$nombre=isset($_POST['nombre'])? mysqli_real_escape_string($db,$_POST['nombre']) : false;
		$apellido=isset($_POST['apellido']) ? mysqli_real_escape_string($db,$_POST['apellido']) :false ;
		$email=isset($_POST['email']) ? mysqli_real_escape_string($db,$_POST['email']) : false;
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
	//insercion
	$guardar_usuario=false;
	if(count($errores)==0){
		$guardar_usuario=true;
		$usuario=$_SESSION['usuario'];
		$id=$_SESSION['usuario']['id'];
		$sql="
		UPDATE usuarios
		SET nombre = '$nombre',
		apellidos = '$apellido',
		email = '$email',
		fecha = curdate()
		WHERE
		id='$id'
		";
		$guardar=mysqli_query($db,$sql);
		if($guardar){
			$_SESSION['usuario']['nombre']=$nombre;
			$_SESSION['usuario']['apellidos']=$apellido;
			$_SESSION['usuario']['email']=$email;
			$_SESSION['completado']='Tus datos se han actualizado con exito';
			echo'algo va bien';
		}
		else{
			$_SESSION['errores']['general']='Fallo al actualizar datos';
		}
	}
	else{
		$_SESSION['errores']=$errores;
		
		
	}
	header('location:../mis_datos.php');
?>		