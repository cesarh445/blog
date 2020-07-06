<?php
	function mostrarError($errores,$campo){
		$alerta='';
		if(isset($errores[$campo])&& !empty($campo)){
			$alerta="<div class='alerta alerta-error'>".$errores[$campo]."</div>";
		}
		return $alerta;			
	}
	function borrarErrores(){
		$borrado=false;
		if(isset($_SESSION['errores'])){
			$_SESSION['errores']=null;
			$borrado=session_unset($_SESSION['errores']);
		}
		if(isset($_SESSION['completado'])){
			$_SESSION['completado']=null;
			session_unset($_SESSION['completado']);
		}
		return $borrado;
	}
	function obtenerCategorias($conexion){
		$sql="SELECT * FROM categorias ORDER BY id ASC";
		$result=mysqli_query($conexion,$sql);
		$categorias=array();
		if($result && mysqli_num_rows($result)>=1){
			$categorias=$result;	
		}
		return $categorias;
	}
	
	function conseguirUltimasEntradads($conexion){
			$sql="SELECT e.*,c.* FROM entradas";
		
	}
?>