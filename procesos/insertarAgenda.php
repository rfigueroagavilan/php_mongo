<?php session_start();

    include "../clases/Conexion.php";
    include "../clases/CrudAgendamiento.php";
    include "../clases/Crud.php";

    $CrudAgendamiento = new CrudAgendamiento();

    $ultimoIdAgendamiento = $CrudAgendamiento->ultimoIdAgendamiento();

    $ultimoId = intval($ultimoIdAgendamiento->_id)+1;

    date_default_timezone_set("America/Santiago");
    $fecha = date("d-m-Y h:i:sa");
    
    $datos = array(
        "_id" => $ultimoId,
        "fechaAgendamiento" => $fecha,
        "fechaTope" => $_POST['fechaTope'],
        "fechaEntrega" => '',
        "idLibro" => intval($_POST['idLibro']),
        "idCliente" => intval($_POST['idCliente'])
    );

    $respuesta = $CrudAgendamiento->insertarDatos($datos);

    

    $Crud = new Crud();
    $id = $_POST['idLibro'];
    $datos = array(
        "Disponibilidad" => intval(0)
    );

    $Crud->actualizar($id, $datos);

    if ($respuesta->getInsertedId() > 0) {
        $_SESSION['mensaje_crud'] = 'insert';
        header("location:../index.php"); 
    } else {
        print_r($respuesta);
    }
?>