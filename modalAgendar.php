<?php 

include "./clases/Conexion.php";
include "./clases/Crud.php";

$crud = new Crud();
$idLibro = $_GET['idLibro'];
$datos = $crud->obtenerDocumento($idLibro);


?>

<style>
#lista-filtros {
float: left;
list-style: none;
margin-top: -3px;
padding: 0;
width: 190px;
position: absolute;
}

#lista-filtros li {
    padding: 10px;
    background: #f0f0f0;
    border-bottom: #bbb9b9 1px solid;
}

#lista-filtros li:hover {
    background: #ece3d2;
    cursor: pointer;
}
</style>


<script>
  $( function() {
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);

    $("#fechaTope").datepicker();
    //$( ".selector" ).datepicker( "option", "disabled", true );
    
  } );
</script>


<!-- The Modal -->
<div id="preAgendamiento" class="modal" >
<form action="./procesos/insertarAgenda.php" method="post">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agendamiento</h4>
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
                    <input type="hidden" id="idLibro" name="idLibro" value="<?php echo $datos->_id ?>">
                    <td><?php echo $datos->Título ?></td>
                    <td><?php echo $datos->Autor ?></td>
                    <td><?php echo $datos->Idioma ?></td>
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
                    <input type="hidden" id="idCliente" name="idCliente">
                    <td><input type="text" id="nombre" name="nombre" onkeyup="filtroNombre()"></td>
                        <div id="sugerenciaNombre"></div>
                    <td><input type="text" id="rut" name="rut" onkeyup="filtroRut()">
                        <div id="sugerenciaRut"></div>
                    </td>
                    
                    <td><input type="text" id="fechaTope" name="fechaTope" readOnly="true"></td>
                </tr>
            </tbody>
      </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Guardar</button>
      </div>

    </div>
  </div>
  </form>
</div>

