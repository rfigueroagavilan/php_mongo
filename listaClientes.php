<?php 
	include "./clases/Conexion.php";
	include "./clases/CrudCliente.php";
	$crud = new CrudCliente();
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
		<th>Nombre</th>
		<th>Correo</th>
		<th>Dirección</th>
		<th>Editar</th>
		<th>Historial</th>
	</thead>
	<tbody>
		<?php
		foreach ($datos as $item) {
		?>
			<tr>
				<td><?php echo $item->nombre; ?></td>
				<td><?php echo $item->correo; ?></td>
				<td><?php echo $item->direccion; ?></td>
				</td>
				<td class="text-center">
					<form action="./actualizarCliente.php" method="POST">
						<input type="text" hidden value="<?php echo $item->_id ?>" name="id">
						<button class="btn btn-warning">
							<i class="fa-solid fa-user-pen"></i>
						</button>
					</form>
				</td>
				<td class="text-center">
					<form action="./listadoAgendamiento.php?id=<?php echo $item->_id?>" method="POST">
						<button class="btn btn-warning">
							<i class="fa-solid fa-book"></i>
						</button>
					</form>
				</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>