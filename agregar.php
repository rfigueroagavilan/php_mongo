	<?php 
	
	include "./header.php"; 
	?>
	

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card mt-4">
					<div class="card-body">
						<a href="index.php" class="btn btn-outline-info">
							<i class="fa-solid fa-angles-left"></i> Regresar
						</a>
						<h2>Agregar nuevo registro</h2>
						<form action="./procesos/insertar.php" method="post">
							<label >Título</label>
							<input type="text" class="form-control" id="titulo" name="titulo" required>
							<label >Autor</label>
							<input type="text" class="form-control" id="autor" name="autor">
							<label >Idioma</label>
							<input type="text" class="form-control" id="idioma" name="idioma" required>
							<label >Año</label>
							<input type="text" id="anio" name="anio" class="form-control" required>
							<label >Pais</label>
							<input type="text" id="pais" name="pais" class="form-control" required>
							<button class="btn btn-primary mt-3">
								<i class="fa-solid fa-floppy-disk"></i> Agregar
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include "./scripts.php"; ?>