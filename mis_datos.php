<?php require_once('includes/redireccion.php')?>
<?php require_once('includes/header.php');?>
<?php require_once('includes/aside.php')?>
<div id="principal">
	<h1>Mis datos</h1>
	<?php
	if(isset($_SESSION['completado'])):?>
	<div class='Alerta exito'>
		<?=$_SESSION['completado']?>
	</div>
	<?php elseif(isset( $_SESSION['errores'])): ?>
	<div class='Alerta exito'>
		<?=$_SESSION['errores']['general']?>
	</div>
	<?php endif;?>
	<form action="categoria/actulizar_datos.php" method="POST">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre"  value="<?=$_SESSION['usuario']['nombre']?>"/>
		<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : '';?>
		<label for="apellido">Apellido</label>
		<input type="text" name="apellido" value="<?=$_SESSION['usuario']['apellidos']?>"/>
		<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellido') : '';?>
		<label for="email">Email</label>
		<input type="email" name="email" value="<?=$_SESSION['usuario']['email']?>"/>
		<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') : '';?>
		<input type="submit" value="Actualizar" name="submit">
	</form>
	
</div>
<?php require_once('includes/footer.php');?>