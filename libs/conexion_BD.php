<?php

class ConexionBD {

    private static $SGBD = SGBD;
    private static $DB_HOST = DB_HOST;
    private static $DB_NAME = DB_NAME;
    private static $DB_USER = DB_USER;
    private static $DB_PASS = DB_PASSWORD;
    private static $DB_CHARSET = DB_CHARSET;
    private static $DSN = DSN;
    protected $connection;
    protected $sql;
    protected $PDOStmt;
    protected $rows;
    protected $result = Array();

    function __construct() {
        try {
            $this->connection = new PDO(SELF::$DSN,SELF::$DB_USER,SELF::$DB_PASS);
            $this->connection->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
            return $this->connection;
        } catch (PDOException $e) {
            new GetErrores("Error en la conexion a la base de datos");
        }
    }

    public function generarReporte () {}
    public function generarReporteInhabilitados () {}

    //con tan solo estas lineas de codigo, estamos cerrando conexiones hechas como tambien 
    //posibles variables que puedan consumir recursos
    public function __destruct () {
        $connection=null;
        $sql=null;
        $PDOStmt=null;
        $rows=null;
        $result = null;
    }
}

?>