<?php 

    //ini_set('display_errors', '1');
    //ini_set('display_startup_errors', '1');
    //error_reporting(E_ALL);


    class CrudAgendamiento {


        public function ultimoIdAgendamiento() {
            try {
                $conexion = Conexion::conectar();
                $coleccion = $conexion->agendamiento;
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

        public function ultimoIdEntrega($id) {
            //try {
                $id = intval($id);
                $conexion = Conexion::conectar();
                $coleccion = $conexion->agendamiento;
                $datos = $coleccion->find(
                                            ['idLibro' => $id],
                                            [ 'sort' => ["_id" => -1],
                                              'limit' => 1 ]
                                         );
                return $datos;
            //} catch (\Throwable $th) {
            //    return $th->getMessage();
            //}
        }

        public function obtenerDocumento($id) {
            try {
                $id = intval($id);
                $conexion = Conexion::conectar();
                $coleccion = $conexion->agendamiento;
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
                $coleccion = $conexion->agendamiento;
                $respuesta = $coleccion->insertOne($datos);
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }


        public function actualizar($id, $datos) {
            try {
                $id = intval($id);
                $conexion = Conexion::conectar();
                $coleccion = $conexion->agendamiento;
                $respuesta = $coleccion->updateOne(
                                            ['_id' => $id],
                                            ['$set' => $datos]
                                        );
                return $respuesta;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function mostrarDatosPorCliente($id) {
            try {
                $id = intval($id);
                $conexion = Conexion::conectar();
                $coleccion = $conexion->agendamiento;
                $datos = $coleccion->find(
                                            ['idCliente' => $id]
                                        );
                return $datos;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }

        public function mostrarDatosPorLibro($id) {
            try {
                $id = intval($id);
                $conexion = Conexion::conectar();
                $coleccion = $conexion->agendamiento;
                $datos = $coleccion->find(
                                            ['idLibro' => $id]
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