<?php

class ProductosModelo extends ConexionBD{


    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoProductos'] = $this->connection->query("SELECT * FROM PRODUCTOS ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProveedores'] = $this->connection->query("SELECT ProNIT,ProNombre FROM TBL_PROVEEDORES ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los productos";
        }
    }

    public function getByID ($id) {
        $this->PDOStmt = $this->connection->prepare("SELECT * FROM PRODUCTOS WHERE ProCodBarras = ?");
        $this->PDOStmt->execute(array($id));
        echo(json_encode($PDOstmt->fetchAll(PDO::FETCH_ASSOC)));
    }
}

?>