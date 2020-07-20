<?php require_once('includes/redireccion.php')?>
<?php require_once('includes/header.php');?>
<?php require_once('includes/aside.php')?>
<div id="principal">
	<h1>Crear entrada</h1>
	<!--Formulario categoria-->
	<p>
		Añade nuevas estradas al blog
	</p>
	<form action="categoria/guardar_entrada.php" method="POST">
		<label for="titulo">Titulo</label>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'titulo') : '';?>
		<input type="text" name="titulo"/>
		<label for="descripcion">Descripcion:</label>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'descripcion') : '';?>
		<textarea type="text" name="descripcion"></textarea>
		<label for="categoria">Categoria</label>
		<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'],'categoria') : '';?>
		<select name="categoria">
			<?php $categorias=obtenerCategorias($db);
				if(!empty($categorias)):
				while($categoria=mysqli_fetch_assoc($categorias)):
			?>
			<option value="<?=$categoria['id']?>">
				<?=$categoria['nombre']?>
			</option>
			<?php
				endwhile;
				endif;
			?>
		</select>
		<input type="submit" value="Guardar"/>
	</form>
	<?php borrarErrores();?>
</div>
<!--fin principal-->
<!--pie de pagina-->
<?php require_once('includes/footer.php');?>
</body>

</html>	