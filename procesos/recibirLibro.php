<?php session_start();
    include "../clases/Conexion.php";
    include "../clases/Crud.php";
    include "../clases/CrudAgendamiento.php";

    $CrudAgendamiento = new CrudAgendamiento();

    $idAgenda = $_POST['idAgenda'];

    date_default_timezone_set("America/Santiago");
    $fecha = date("d-m-Y h:i:sa");

    $datosAgenda = array(
        "fechaEntrega" => $fecha
    );

    $respuesta = $CrudAgendamiento->actualizar($idAgenda, $datosAgenda);


    $Crud = new Crud();

    $idLibro = $_POST['idLibro'];
    $datosLibro = array(
        "Disponibilidad" => intval(1)
    );

    $Crud->actualizar($idLibro, $datosLibro);

    if ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0) {
        $_SESSION['mensaje_crud'] = 'update';
        header("location:../index.php");
    } else {
        print_r($respuesta);
    }

?>