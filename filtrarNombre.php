<?php
	//ini_set('display_errors', '1');
    //ini_set('display_startup_errors', '1');
    //error_reporting(E_ALL);

	include "./clases/Conexion.php";
	include "./clases/CrudCliente.php";

	$crud = new CrudCliente();
	$nombre = $_GET['filtroTxt'];

	$datos = $crud->obtenerNombre($nombre);
?>

<ul id="lista-filtros">
<?php
foreach ($datos as $item) {

    ?>
   <li onClick="seleccionarCliente('<?php echo $item->nombre; ?>','<?php echo $item->rut; ?>','<?php echo $item->_id; ?>');"> <?php echo $item->nombre; ?> </li>
<?php }  ?>
</ul>
