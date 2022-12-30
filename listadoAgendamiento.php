<?php 
	include "./clases/Conexion.php";
	include "./header.php"; 
	include "./clases/Crud.php";
	$Crud = new Crud();
	
	include "./clases/CrudCliente.php";
	$CrudCliente = new CrudCliente();
	$id = $_GET['id'];

	
	$datosCliente = $CrudCliente->obtenerDocumento($id);

	include "./clases/CrudAgendamiento.php";
	$CrudAgendamiento = new CrudAgendamiento();
	$datosAgendamiento = $CrudAgendamiento->mostrarDatosPorCliente($datosCliente->_id);

	?>

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card mt-4">
					<div class="card-body">
						<a href="clientes.php" class="btn btn-outline-info">
							<i class="fa-solid fa-angles-left"></i> Regresar
						</a>
						<h2>Historial de Cliente: <?php echo $datosCliente->nombre ?></h2>
						<table class="table table-sm table-hover table-bordered">
							<thead>
								<th>Titulo</th>
								<th>Fecha Agendamiento</th>
								<th>Fecha Tope</th>
								<th>Fecha Entrega</th>
							</thead>
							<tbody>
							<?php foreach ($datosAgendamiento as $agendamiento) { 
								
								$datosLibro = $Crud->obtenerDocumento($agendamiento->idLibro);
							?>
								<tr>
									<td><?php echo $datosLibro->Título; ?></td>
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