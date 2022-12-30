<?php session_start();

    include "../clases/Conexion.php";
    include "../clases/Crud.php";

    $Crud = new Crud();

    $ultimoIdLibros = $Crud->ultimoIdLibros();

    $ultimoId = intval($ultimoIdLibros->_id)+1;

    $datos = array(
        "_id" => $ultimoId,
        "Título" => $_POST['titulo'],
        "Autor" => $_POST['autor'],
        "Idioma" => $_POST['idioma'],
        "Año" => $_POST['anio'],
        "Pais" => $_POST['pais'],
        "Disponibilidad" => 1
    );

    $respuesta = $Crud->insertarDatos($datos);
    if ($respuesta->getInsertedId() > 0) {
        $_SESSION['mensaje_crud'] = 'insert';
        header("location:../index.php"); 
    } else {
        print_r($respuesta);
    }
?>