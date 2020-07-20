<?php
	
	if(isset($_POST)){
		require_once('../includes/conexion.php');
		$titulo=isset($_POST['titulo'] ) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
		$descripcion=isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']): false;
		$categoria=isset($_POST['categoria']) ? (int)$_POST['categoria']: false;
		$id_usuario=$_SESSION['usuario']['id'];
	}
	// validacion
	$errores=[];
	if(empty($titulo)){
		$errores['titulo']='El titulo esta vacio o es invalido';
		
	}
	if(empty($descripcion)){
		$errores['descripcion']='La descripcion esta vacia o es invalida';
		
	}	
	if(empty($categoria) && !is_numeric(categoria)){
		$errores['categoria']='La categoria esta vacia o es invalida';
		
	}
	if(count($errores)==0){
		$sql="
		INSERT INTO entradas
		VALUES
		(
		NULL,
		'$id_usuario',
		'$categoria',
		'$titulo',
		'$descripcion',
		CURDATE()
		)
		";
		$guardar=mysqli_query($db,$sql);
		header('location:..');
	}
	else{
		$_SESSION['errores_entrada']=$errores;
		header('location:../crearentradas.php');
	}
	
	
?>			