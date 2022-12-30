<?php 
	include "./clases/Conexion.php";
	include "./header.php"; 
	include "./clases/Crud.php";
	$Crud = new Crud();
    $id = $_POST['id'];
    $datosLibro = $Crud->obtenerDocumento($id);
	
	include "./clases/CrudCliente.php";
	$CrudCliente = new CrudCliente();
	
	
    
	include "./clases/CrudAgendamiento.php";
	$CrudAgendamiento = new CrudAgendamiento();
	$datosAgendamiento = $CrudAgendamiento->mostrarDatosPorLibro($id);

	?>

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card mt-4">
					<div class="card-body">
						<a href="index.php" class="btn btn-outline-info">
							<i class="fa-solid fa-angles-left"></i> Regresar
						</a>
						<h2>Historial de Libro: <?php echo $datosLibro->Título ?></h2>
						<table class="table table-sm table-hover table-bordered">
							<thead>
								<th>Nombre Cliente</th>
								<th>Fecha Agendamiento</th>
								<th>Fecha Tope</th>
								<th>Fecha Entrega</th>
							</thead>
							<tbody>
							<?php foreach ($datosAgendamiento as $agendamiento) { 
								
								$datosCliente = $CrudCliente->obtenerDocumento($agendamiento->idCliente);
							?>
								<tr>
									<td><?php echo $datosCliente->nombre; ?></td>
									<td><?php echo $agendamiento->fechaAgendamiento; ?></td>
									<td><?php echo $agendamiento->fechaTope; ?></td>
									<td><?php echo $agendamiento->fechaEntrega; ?></td>
									</td>
								</tr>
							<?php }	?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include "./scripts.php"; ?>