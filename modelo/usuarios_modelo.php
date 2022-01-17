<?php

class UsuariosModelo extends ConexionBD {

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoEmpleados'] = $this->connection->query("SELECT * FROM tbl_empleados ORDER BY EmpNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoEmpleadosInhabilitados'] = $this->connection->query("SELECT * FROM tbl_empleados_inhabilitados ORDER BY EmpFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los proveedores";
        }
    }
}

?>