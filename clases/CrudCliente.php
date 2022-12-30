<?php 

    //ini_set('display_errors', '1');
    //ini_set('display_startup_errors', '1');
    //error_reporting(E_ALL);


    class CrudCliente {

        
        public function mostrarDatos($filtro = '') {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->clientes;
                $datos = $coleccion->find(
                                            ['$or' => [
                                                    ['nombre' => new MongoDB\BSON\Regex($filtro)],
                                                    ['correo' => new MongoDB\BSON\Regex($filtro)],
                                                    ['rut' => new MongoDB\BSON\Regex($filtro)]
                                                    ]
                                            ],
                                            [ 'limit' => 10 ]);
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function ultimoIdCliente() {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->clientes;
                $datos = $coleccion->findOne(
                                            [],
                                            [ 'sort' => ["_id" => -1],
                                              'limit' => 1 ]
                                         );
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function obtenerDocumento($id) {
            try {
                $id = intval($id);
                $conexion = Conexion::conectar();
                $coleccion = $conexion->clientes;
                $datos = $coleccion->findOne(
                                            ['_id' => $id], []  
                                    );
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function insertarDatos($datos) {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->clientes;
                $respuesta = $coleccion->insertOne($datos);
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function eliminar($id) {
            try {
                $id = intval($id);
                $conexion = Conexion::conectar();
                $coleccion = $conexion->clientes;
                $respuesta = $coleccion->deleteOne(
                                            array(
                                                '_id' => $id
                                            )
                                        );
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function actualizar($id, $datos) {
            try {
                $id = intval($id);
                $conexion = Conexion::conectar();
                $coleccion = $conexion->clientes;
                $respuesta = $coleccion->updateOne(
                                            ['_id' => $id],
                                            ['$set' => $datos]
                                        );
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function obtenerRut($rut) {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->clientes;
                $datos = $coleccion->find(
                                    [ 'rut' => new MongoDB\BSON\Regex($rut)], 
                                    [ 'limit' => 5 ]
                                    );
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function obtenerNombre($nombre) {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->clientes;
                $datos = $coleccion->find(
                                    [ 'nombre' => new MongoDB\BSON\Regex($nombre)], 
                                    [ 'limit' => 5 ]
                                    );
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function mensajesCrud($mensaje) {
            $msg = '';

            if ($mensaje == 'insert') {
                $msg = 'swal("Excelente!", "Agregado con exito!", "success")';
            } else if ($mensaje == 'update') {
                $msg = 'swal("Excelente!", "Actualizado con exito!", "info")';
            } else if ($mensaje == 'delete') {
                $msg = 'swal("Excelente!", "Eliminado con exito!", "warning")';
            }

            return $msg;
        }
    }

?>