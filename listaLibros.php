<?php 
	include "./clases/Conexion.php";
	include "./clases/Crud.php";
	include "./clases/CrudAgendamiento.php";
	$crud = new Crud();
    $filtroTxt = $_GET['filtroTxt'];
	$datos = $crud->mostrarDatos($filtroTxt);


	$mensaje = '';
	if (isset($_SESSION['mensaje_crud'])) {
		$mensaje = $crud->mensajesCrud($_SESSION['mensaje_crud']);
		unset($_SESSION['mensaje_crud']);
	}
?>

<table class="table table-sm table-hover table-bordered">
						<thead>
							<th>Título</th>
							<th>Autor</th>
							<th>Idioma</th>
							<th>Disponibilidad</th>
							<th>Historial</th>
							<th>Editar</th>
							<th>Agendar</th>
							<th>Recepción</th>
						</thead>
						
							<?php
							foreach ($datos as $item) {
							?>
								<tr>
									<td><?php echo $item->Título; ?></td>
									<td><?php echo $item->Autor; ?></td>
									<td><?php echo $item->Idioma; ?></td>
									<td><?php
									$disponibilidad = $item->Disponibilidad == 1 ? "Si" : "No";
									echo $disponibilidad; ?>
									</td>
									<td class="text-center">
										<form action="./historialLibro.php" method="POST">
											<input type="text" hidden value="<?php echo $item->_id ?>" name="id">
											<button class="btn btn-warning">
												<i class="fa-solid fa-clock-rotate-left"></i>
											</button>
										</form>
									</td>
									<td class="text-center">
										<form action="./actualizar.php" method="POST">
											<input type="text" hidden value="<?php echo $item->_id ?>" name="id">
											<button class="btn btn-warning">
												<i class="fa-solid fa-file-pen"></i>
											</button>
										</form>
									</td>
									<td class="text-center">
										<?php 
										$disponibilidad = $item->Disponibilidad == 1 ? "btn-success" : "btn-danger";
										$enabled = $item->Disponibilidad == 1 ? "enabled" : "disabled";
										?>
										<button class="btn <?= $disponibilidad?>" onclick="modalAgendamiento(<?php echo $item->_id ?>)" data-bs-toggle="modal" data-bs-target="#preAgendamiento" <?= $enabled?> >
										<i class="fa-solid fa-user-xmark"></i>
										</button>
									</td>
									<td class="text-center">
									<?php 
									$disponibilidad = $item->Disponibilidad == 0 ? "btn-success" : "btn-danger";
									$enabled = $item->Disponibilidad == 0 ? "enabled" : "disabled";
									$CrudAgendamiento = new CrudAgendamiento();
									$idLibro = $item->_id;

									$ultimoIdEntrega = $CrudAgendamiento->ultimoIdEntrega($idLibro);

									foreach($ultimoIdEntrega as $idEntrega){
										$ultimoIdEntrega = $idEntrega->_id;
									}
									if(is_object($ultimoIdEntrega)){
										$ultimoIdEntrega = 0;
									}
									//echo gettype($ultimoIdEntrega);
									?>
									<button class="btn <?= $disponibilidad?>" onclick="modalRecepcionar(<?php echo $ultimoIdEntrega ?>)" data-bs-toggle="modal" data-bs-target="#preAgendamiento" <?= $enabled?> >
										<i class="fa-solid fa-user-xmark"></i>
										</button>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>

<div id="modalAgendamiento">

</div>

<div id="modalRecepcionar">

</div>
