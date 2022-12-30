<?php session_start();

    include "../clases/Conexion.php";
    include "../clases/CrudCliente.php";

    $Crud = new CrudCliente();

    $ultimoIdCliente = $Crud->ultimoIdCliente();

    $ultimoId = intval($ultimoIdCliente->_id)+1;

    $datos = array(
        "_id" => $ultimoId,
        "nombre" => $_POST['nombre'],
        "correo" => $_POST['correo'],
        "direccion" => $_POST['direccion'],
        "rut" => $_POST['rut'],
        "telefono" => $_POST['telefono']
    );

    $respuesta = $Crud->insertarDatos($datos);
    if ($respuesta->getInsertedId() > 0) {
        $_SESSION['mensaje_crud'] = 'insert';
        header("location:../clientes.php"); 
    } else {
        print_r($respuesta);
    }
?>