<?php 

    //ini_set('display_errors', '1');
    //ini_set('display_startup_errors', '1');
    //error_reporting(E_ALL);


    class Crud {

        
        public function mostrarDatos($filtro = '') {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->libros;
                $datos = $coleccion->find(
                                            ['$or' => [
                                                    ['Título' => new MongoDB\BSON\Regex($filtro)],
                                                    ['Autor' => new MongoDB\BSON\Regex($filtro)],
                                                    ['Idioma' => new MongoDB\BSON\Regex($filtro)]
                                                    ]
                                            ],
                                            [ 'limit' => 10 ]);
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function ultimoIdLibros() {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->libros;
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
                $coleccion = $conexion->libros;
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
                $coleccion = $conexion->libros;
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
                $coleccion = $conexion->libros;
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
                $coleccion = $conexion->libros;
                $respuesta = $coleccion->updateOne(
                                            ['_id' => $id],
                                            ['$set' => $datos]
                                        );
                return $respuesta;
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