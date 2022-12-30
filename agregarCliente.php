<?php 
	
	include "./header.php"; 
	?>
	

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card mt-4">
					<div class="card-body">
						<a href="clientes.php" class="btn btn-outline-info">
							<i class="fa-solid fa-angles-left"></i> Regresar
						</a>
						<h2>Agregar nuevo registro</h2>
						<form action="./procesos/insertarCliente.php" method="post">
                            <label >Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" >
                            <label >Correo</label>
                            <input type="text" class="form-control" id="correo" name="correo" >
                            <label >Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" >
                            <label >Rut</label>
                            <input type="text" class="form-control" id="rut" name="rut" >
                            <label >Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" >
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