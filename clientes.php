<?php session_start();
	include "./clases/Conexion.php";
	include "./clases/CrudCliente.php";

	$crud = new CrudCliente();
	
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
					<h2>Clientes</h2>
					<div class="row">
						<div class="col-6">
							<label>Filtro</label>
							<input type="text" id="filtroTxt" name="filtroTxt" onkeyup="filtroClientes()">
							<label>Nombre/Correo/Rut</label>
						</div>
						<div class="col-3">
							<a href="./index.php" class="btn btn-primary right">
								<i class="fa-solid fa-book"></i> Libros
							</a>
						</div>
						<div class="col-3">
							<a href="./agregarCliente.php" class="btn btn-primary right">
								<i class="fa-solid fa-user-plus"></i> Agregar nuevo Cliente
							</a>
						</div>
					</div>
					<hr>
					<div id="listaClientes" name="listaClientes">

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