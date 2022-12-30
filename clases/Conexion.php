<?php 

    //ini_set('display_errors', '1');
    //ini_set('display_startup_errors', '1');
    //error_reporting(E_ALL);

    require_once $_SERVER['DOCUMENT_ROOT'] . "/crud_mongo/vendor/autoload.php";

    class Conexion {
        public static function conectar() {
           try {
                $servidor = "127.0.0.1";
                $puerto = "27017";
                //$usuario = "mongoadmin";
                //$password = "123456";
                $BD = "proyecto_4";
                $cadenaConexion = "mongodb://" . 
                                    //$usuario . ":" . 
                                    //$password . "@". 
                                    $servidor .":". 
                                    $puerto ."/". 
                                    $BD;
                $cliente = new MongoDB\Client($cadenaConexion);
                return $cliente->selectDatabase($BD);
           } catch (\Throwable $th) {
               return $th->getMessage();
           }
        }
    }

?>