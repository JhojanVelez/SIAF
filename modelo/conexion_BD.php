<?php

class ConexionBD {

    private static $SGBD;
    private static $DB_HOST;
    private static $DB_NAME;
    private static $DB_USER;
    private static $DB_PASS;
    private static $DB_CHARSET;
    private static $DSN;
    protected $connection;

    function __construct() {
        SELF::$SGBD = "mysql";
        SELF::$DB_HOST = "localhost";
        SELF::$DB_NAME = "siaf";
        SELF::$DB_USER = "root";
        SELF::$DB_PASS = "";
        SELF::$DB_CHARSET = "utf8";
        SELF::$DSN = SELF::SGBD.":host=".SELF::DB_HOST.";dbname=".SELF::DB_NAME.";charset=".SELF::DB_CHARSET;
    }

    protected function conectar () {
        try {
            $this->connection = new PDO(SELF::$DSN,SELF::$DB_USER,SELF::$DB_PASS);
            $this->connection->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
            return $this->connection;
        } catch (PDOException $e) {
            $error_message = new GetErrores("Error en la conexion a la base de datos");
        }
    } 
}

?>