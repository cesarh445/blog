<?php require_once('includes/header.php');?>

<?php require_once('includes/aside.php')?>
<div id="principal">
	<h1>Ultimas entradas</h1>
	
	
	<?php
		$entradas=conseguirUltimasEntradas($db);
		if(!empty($entradas)):
		while($entrada=mysqli_fetch_assoc($entradas)):
	?>
	<article class="entries">
		<a href="">
			<h2><?=$entrada['titulo'];?></h2>
			<span class='fecha'><?=$entrada['categoria'].'  |  '.$entrada['fecha'];?></span>
			<p>
				<?=substr($entrada['descripcion'],0,200).'...';?>
			</p>
		</a>
	</article>
	
	<?php
		//var_dump($entrada);
		endwhile;
		endif;
	?>
	<div id="all">
		<a href="">Ver todas las entradas</a>
	</div>
</div>
<!--fin principal-->
<!--pie de pagina-->
<?php require_once('includes/footer.php');?>
</body>

</html>										