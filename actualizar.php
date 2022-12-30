
<?php 

	//ini_set('display_errors', '1');
    //ini_set('display_startup_errors', '1');
    //error_reporting(E_ALL);

	include "./clases/Conexion.php";
	include "./clases/Crud.php";
	include "./header.php";

	$crud = new Crud();
	$id = $_POST['id'];
	$datos = $crud->obtenerDocumento($id);
	
	$idMongo = $datos->_id;
	
  ?>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card mt-4">
				<div class="card-body">

					<a href="index.php" class="btn btn-outline-info">
						<i class="fa-solid fa-angles-left"></i> Regresar
					</a>
					<h2>Actualizar registro</h2>

					<form action="./procesos/actualizar.php" method="POST">
						<input type="text" hidden value="<?php echo $idMongo ?>" name="id">
						<label >Título</label>
						<input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $datos->Título ?>">
						<label >Autor</label>
						<input type="text" class="form-control" id="autor" name="autor" value="<?php echo $datos->Autor ?>">
						<label >Año</label>
						<input type="text" class="form-control" id="anio" name="anio" value="<?php echo $datos->Año ?>">
						<label >Pais</label>
						<input type="text" class="form-control" id="pais" name="pais" value="<?php echo $datos->País ?>">
						<label >Idioma</label>
						<input type="text" class="form-control" id="idioma" name="idioma" value="<?php echo $datos->Idioma ?>">
						<button class="btn btn-warning mt-3">
							<i class="fa-solid fa-floppy-disk"></i> Actualizar
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "./scripts.php"; ?>