<?php require_once('helpers.php');?>
<aside id="sidebar">
	<div id="login" class="block_aside">
		<h3>Inicia sesión</h3>
		<form action="login.php" method="POST">
			<label for="email">Email</label>
			<input type="email" name="email" />
			<label for="password">Contraseña</label>
			<input type="password" name="pass" />
			<input type="submit" value="Entrar">
		</form>
	</div>
	<div id="registrate" class="block_aside">
		<h3>Registrate</h3>
		<?php
		if(isset($_SESSION['completado'])):?>
		<div class='Alerta exito'>
			<?=$_SESSION['completado']?>
		</div>
		<?php else: ?>
		<div class='Alerta exito'>
			<?=$_SESSION['errores']['general']?>
		</div>
		<?php endif;?>
		<form action="registro/registro.php" method="POST">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" />
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : '';?>
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" />
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellido') : '';?>
			<label for="email">Email</label>
			<input type="email" name="email" />
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email') : '';?>
			<label for="password">Contraseña</label>
			<input type="password" name="pass" />
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'pass') : '';?>
			<input type="submit" value="Registar" name="submit">
		</form>
	</div>
	
</aside>			