<?php session_start();
    include "../clases/Conexion.php";
    include "../clases/CrudCliente.php";

    $Crud = new CrudCliente();

    $id = $_POST['id'];
    $datos = array(
        "nombre" => $_POST['nombre'],
        "correo" => $_POST['correo'],
        "direccion" => $_POST['direccion'],
        "rut" => $_POST['rut'],
        "telefono" => $_POST['telefono']
    );

    $respuesta = $Crud->actualizar($id, $datos);

    if ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0) {
        $_SESSION['mensaje_crud'] = 'update';
        header("location:../clientes.php");
    } else {
        print_r($respuesta);
    }

?>