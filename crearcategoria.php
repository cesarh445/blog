<?php require_once('includes/redireccion.php')?>
<?php require_once('includes/header.php');?>
<?php require_once('includes/aside.php')?>
<div id="principal">
	<h1>Crear categoria</h1>
	<!--Formulario categoria-->
	<form action="categoria/guardar_categoria.php" method="POST">
		<label for="nombre">Nombre de la categoria</label>
		<input type="text" name="nombre"/>		
		<input type="submit" value="Guardar"/>
	</form>
</div>
<!--fin principal-->
<!--pie de pagina-->
<?php require_once('includes/footer.php');?>
</body>

</html>	