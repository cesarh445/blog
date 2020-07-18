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
		<input type="text" name="titulo"/>
		<label for="descripcion">Descripcion:</label>
		<textarea type="text" name="descripcion"></textarea>
		<label for="categoria">Categoria</label>
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
</div>
<!--fin principal-->
<!--pie de pagina-->
<?php require_once('includes/footer.php');?>
</body>

</html>	