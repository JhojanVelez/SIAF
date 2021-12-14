<?php

class InventarioKardexModelo extends ConexionBD{

    private $codigoBarrasProducto;
    private $descripcionProducto;
    private $nitProveedor;
    private $nombreProveedor;
    private $laboratorioProducto;
    private $presentacionProducto;

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoKardex'] = $this->connection->query("SELECT * FROM kardex ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener toda la informacion del Kardex";
        }
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM kardex 
                    WHERE 
                    ProCodBarras LIKE :codigoBarrasProducto OR 
                    ProDescripcion LIKE :descripcionProducto OR 
                    ProNIT LIKE :nitProveedor OR
                    ProNombre LIKE :nombreProveedor OR
                    ProLaboratorio LIKE :laboratorioProducto OR
                    ProPresentacion LIKE :presentacionProducto
                    ORDER BY ProDescripcion";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":codigoBarrasProducto",$this->codigoBarrasProducto);
        $this->PDOStmt->bindValue(":descripcionProducto",$this->descripcionProducto);
        $this->PDOStmt->bindValue(":nitProveedor",$this->nitProveedor);
        $this->PDOStmt->bindValue(":nombreProveedor",$this->nombreProveedor);
        $this->PDOStmt->bindValue(":laboratorioProducto",$this->laboratorioProducto);
        $this->PDOStmt->bindValue(":presentacionProducto",$this->presentacionProducto);

        $this->PDOStmt->execute();

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* Metodos getter */

    public function getCodigoBarrasProducto () {return $this->codigoBarrasProducto;}
    public function getDescripcionProducto () {return $this->descripcionProducto;}
    public function getNombreProveedor () {return $this->nitProveedor;}
    public function getNitProveedor () {return $this->nombreProveedor;}
    public function getLaboratorioProducto () {return $this->laboratorioProducto;}
    public function getPresentacionProducto () {return $this->presentacionProducto;}

    /* Metodos setter */

    public function setCodigoBarrasProducto ($value) {
        $this->codigoBarrasProducto = $value;
    }
    public function setDescripcionProducto ($value) {
        $this->descripcionProducto = $value;
    }
    public function setNitProveedor ($value) {
        $this->nitProveedor = $value;
    }
    public function setNombreProveedor ($value) {
        $this->nombreProveedor = $value;
    }
    public function setLaboratorioProducto ($value) {
        $this->laboratorioProducto = $value;
    }
    public function setPresentacionProducto ($value) {
        $this->presentacionProducto = $value;
    }
}
?>