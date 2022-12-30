
<?php 

//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

include "./clases/Conexion.php";
include "./clases/CrudCliente.php";
include "./header.php";

$crud = new CrudCliente();
$id = $_POST['id'];
$datos = $crud->obtenerDocumento($id);

$idMongo = $datos->_id;

?>

<div class="container">
<div class="row">
    <div class="col">
        <div class="card mt-4">
            <div class="card-body">

                <a href="clientes.php" class="btn btn-outline-info">
                    <i class="fa-solid fa-angles-left"></i> Regresar
                </a>
                <h2>Actualizar registro</h2>

                <form action="./procesos/actualizarCliente.php" method="POST">
                    <input type="text" hidden value="<?php echo $idMongo ?>" name="id">
                    <label >Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos->nombre ?>">
                    <label >Correo</label>
                    <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $datos->correo ?>">
                    <label >Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $datos->direccion ?>">
                    <label >Rut</label>
                    <input type="text" class="form-control" id="rut" name="rut" value="<?php echo $datos->rut ?>">
                    <label >Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $datos->telefono ?>">
                    <button class="btn btn-warning mt-3">
                        <i class="fa-solid fa-floppy-disk"></i> Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php include "./scripts.php"; ?>