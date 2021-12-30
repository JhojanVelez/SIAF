<?php

class ClientesModelo extends ConexionBD {

    public function __construct () {
        parent::__construct();
    }

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoClientes'] = $this->connection->query("SELECT * FROM tbl_clientes ORDER BY CliNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoClientesInhabilitados'] = $this->connection->query("SELECT * FROM tbl_clientes_inhabilitados ORDER BY CliFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los clientes";
        }
    }
}

?>