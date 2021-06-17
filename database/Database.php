<?php
    require_once("config/dbConfig.php");
    /*
        Clase conexion
    */
    class Database
    {
        protected $conn;

        public function __construct()
        {
            try {
                $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASSWORD);
                
                //seteamos estos atributos para poder visualizar los posibles errores
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("SET CHARACTER SET ".DB_CHARSET);
                return $this->conn;

            } catch (Exception $e) {
                print "!Error¡: " . $e->getMessage() . "</br>";
                die();
            }
        }
    }
?>