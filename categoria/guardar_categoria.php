<?php
	if(isset($_POST)){
		require_once('../includes/conexion.php');
		$nombre=isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
	}
	$errores=[];
	//validar nombre
	if(!empty($nombre) && !is_numeric($nombre)&& !preg_match('/[0-9]/',$nombre)){
		$nombre_validado=true;	
	}
	if(count($errores)==0){
		$sql="INSERT INTO categorias VALUES(NULL,'$nombre')";
		$categoria=mysqli_query($db,$sql);
	}
	header('location:../index.php');
?>