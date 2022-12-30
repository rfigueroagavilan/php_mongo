<?php session_start();
	include "./clases/Conexion.php";
	include "./clases/Crud.php";

	$crud = new Crud();
	
	$mensaje = '';
	if (isset($_SESSION['mensaje_crud'])) {
		$mensaje = $crud->mensajesCrud($_SESSION['mensaje_crud']);
		unset($_SESSION['mensaje_crud']);
	}
?>


<?php include "./header.php"; ?>

<div class="container">

	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">
					<h2>iLibrary</h2>
					<div class="row">
						<div class="col-6">
							<label>Filtro</label>
							<input type="text" id="filtroTxt" name="filtroTxt" onkeyup="filtroLibros()">
							<label>Titulo/Autor/Idioma</label>
						</div>
						<div class="col-3">
							<a href="./clientes.php" class="btn btn-primary right">
								<i class="fa-solid fa-user-plus"></i> Clientes
							</a>
						</div>
						<div class="col-3">
							<a href="./agregar.php" class="btn btn-primary right">
								<i class="fa-solid fa-book"></i> Agregar nuevo Libro
							</a>
						</div>
					</div>
					<hr>
					<div id="listaLibros" name="listaLibros">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "./scripts.php"; ?>

<script>

let mensaje = <?php echo $mensaje; ?>;
console.log(mensaje);
</script>