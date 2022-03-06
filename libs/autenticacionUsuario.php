<?php 

class AutenticacionUsuario extends ConexionBD{
    public function autenticarUsuario ($id) {
        $this->PDOStmt = $this->connection->prepare("SELECT * FROM tbl_empleados WHERE EmpDocIdentidad = ?");
        $this->PDOStmt->execute(array($id));
        $this->rows = $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
        return count($this->rows);
    }
}

?>