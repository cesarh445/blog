<aside id="sidebar">
	<?php
		if(isset($_SESSION['usuario'])):
	?>
	<div id="usuario_logueado" class="block_aside">	
		<h3>
			Bienvenido, 
			<?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?>
			<!--botones-->
			<a href="logout/logout.php" class="boton boton-verde">Entradas</a>
			<a href="logout/logout.php" class="boton boton-rojo">Crear categorias</a>
			<a href="logout/logout.php" class="boton boton-naranja">Mis datos</a>
			<a href="logout/logout.php" class="boton boton-azul">Logout</a>
		</h3>
	</div>
	<?php
		endif;
	?>
	<div id="login" class="block_aside">
		<h3>Inicia sesión</h3>
		<?php
		if(isset($_SESSION['error_login'])):?>
		<div class="alerta alerta-error">
			<?=$_SESSION['error_login'];?>
		</div>
		<?php endif; ?>
		<form action="ingreso/login.php" method="POST">
			<label for="email">Email</label>
			<input type="email" name="email" />
			<label for="password">Contraseña</label>
			<input type="password" name="password" />
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
		<?php elseif(isset( $_SESSION['errores'])): ?>
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