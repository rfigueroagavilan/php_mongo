<?php 

include "./clases/Conexion.php";
include "./clases/CrudAgendamiento.php";
include "./clases/Crud.php";
include "./clases/CrudCliente.php";


$ultimoIdEntrega = $_GET['ultimoIdEntrega'];

$CrudAgendamiento = new CrudAgendamiento();
$datosAgenda = $CrudAgendamiento->obtenerDocumento($ultimoIdEntrega);
$idCliente = $datosAgenda->idCliente;
$idLibro = $datosAgenda->idLibro;

$CrudCliente = new CrudCliente();
$datosCliente = $CrudCliente->obtenerDocumento($idCliente);

$CrudLibro = new Crud();
$datosLibro = $CrudLibro->obtenerDocumento($idLibro);


?>







<!-- The Modal -->
<div id="preRecepcion" class="modal" >
<form action="./procesos/recibirLibro.php" method="post">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <input type="hidden" id="idAgenda" name="idAgenda" value="<?php echo $ultimoIdEntrega ?>">
      <input type="hidden" id="idLibro" name="idLibro" value="<?php echo $idLibro ?>">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Recepción</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <table class="table table-sm table-hover table-bordered">
            <thead>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Idioma</th>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $datosLibro->Título ?></td>
                    <td><?php echo $datosLibro->Autor ?></td>
                    <td><?php echo $datosLibro->Idioma ?></td>
                </tr>
            </tbody>
      </table>
      <table class="table table-sm table-hover table-bordered">
            <thead>
                    <th>Nombre</th>
                    <th>Rut</th>
                    <th>Fecha Tope</th>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" id="nombre" name="nombre" readOnly="true" value="<?php echo $datosCliente->nombre ?>"></td>
                    <td><input type="text" id="rut" name="rut" readOnly="true" value="<?php echo $datosCliente->rut ?>"></td>
                    <td><input type="text" id="fechaTope" name="fechaTope" readOnly="true" value="<?php echo $datosAgenda->fechaTope ?>"></td>
                </tr>
            </tbody>
      </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Recepción</button>
      </div>

    </div>
  </div>
  </form>
</div>

