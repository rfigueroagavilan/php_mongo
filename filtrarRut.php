<?php
	//ini_set('display_errors', '1');
    //ini_set('display_startup_errors', '1');
    //error_reporting(E_ALL);

	include "./clases/Conexion.php";
	include "./clases/CrudCliente.php";

	$crud = new CrudCliente();
	$rut = $_GET['filtroTxt'];

	$datos = $crud->obtenerRut($rut);
?>

<ul id="lista-filtros">
<?php
foreach ($datos as $item) {
    
    ?>
   <li onClick="seleccionarCliente('<?php echo $item->nombre; ?>','<?php echo $item->rut; ?>','<?php echo $item->_id; ?>');"> <?php echo $item->rut; ?> </li>
<?php }  ?>
</ul>
