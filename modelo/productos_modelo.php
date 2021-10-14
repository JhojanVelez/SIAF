<?php

class ProductosModelo extends ConexionBD{

    function __construct () {
        parent::__construct();
    }

    public function getAll () {
        try {
            $data = [];
            $data['infoProductos'] = $this->connection->query("SELECT * FROM PRODUCTOS ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            $data['infoProveedores'] = $this->connection->query("SELECT ProNIT,ProNombre FROM TBL_PROVEEDORES ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo("error en la busqueda");
        }
    }

    public function getByID ($id) {
        $PDOstmt = $this->connection->prepare("SELECT * FROM PRODUCTOS WHERE ProCodBarras = ?");
        $PDOstmt->execute(array($id));
        echo(json_encode($PDOstmt->fetchAll(PDO::FETCH_ASSOC)));
    }
}

?>