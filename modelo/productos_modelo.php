<?php

class ProductosModelo extends ConexionBD{

    private $codigoBarras;
    private $descripcion;
    private $ubicacionFisica;
    private $presentacion;
    private $unidadMedida;
    private $precioVenta;
    private $laboratorio;
    private $invima;
    private $nitProveedor;
    private $nomProveedor;

    function __construct () {
        parent::__construct();
    }

    public function obtenerTodosLosDatos () {
        try {
            $this->rows['infoProductos'] = $this->connection->query("SELECT * FROM PRODUCTOS ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProveedores'] = $this->connection->query("SELECT ProNIT,ProNombre FROM TBL_PROVEEDORES ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProductosInhabilitados'] = $this->connection->query("SELECT * FROM TBL_PRODUCTOS_INHABILITADOS ORDER BY ProFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los productos";
        }
    }

    public function buscarPorId ($id) {
        $this->PDOStmt = $this->connection->prepare("SELECT * FROM PRODUCTOS WHERE ProCodBarras = ?");
        $this->PDOStmt->execute(array($id));
        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM PRODUCTOS
                    WHERE
                    ProCodBarras    LIKE :codigoBarras  OR
                    ProDescripcion  LIKE :descripcion   OR
                    ProNombre       LIKE :proveedor     OR
                    ProPresentacion LIKE :presentacion
                    ORDER BY ProDescripcion";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":codigoBarras",$this->codigoBarras);
        $this->PDOStmt->bindValue(":descripcion",$this->descripcion);
        $this->PDOStmt->bindValue(":proveedor",$this->nomProveedor);
        $this->PDOStmt->bindValue(":presentacion",$this->presentacion);

        $this->PDOStmt->execute();

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarProductos () {
        try {
            $this->sql ="INSERT INTO 
                        TBL_PRODUCTOS 
                        VALUES (
                            :codigoBarras,
                            :descripcion,
                            :ubicacionFisica,
                            :presentacion,
                            :unidadMedida,
                            :precioVenta,
                            :laboratorio,
                            :invima,
                            :nitProveedor
                        )";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":codigoBarras",$this->codigoBarras);
            $this->PDOStmt->bindValue(":descripcion",$this->descripcion);
            $this->PDOStmt->bindValue(":ubicacionFisica",$this->ubicacionFisica);
            $this->PDOStmt->bindValue(":presentacion",$this->presentacion);
            $this->PDOStmt->bindValue(":unidadMedida",$this->unidadMedida);
            $this->PDOStmt->bindValue(":precioVenta",$this->precioVenta);
            $this->PDOStmt->bindValue(":laboratorio",$this->laboratorio);
            $this->PDOStmt->bindValue(":invima",$this->invima);
            $this->PDOStmt->bindValue(":nitProveedor",$this->nitProveedor);

            $this->PDOStmt->execute();

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["errorPDOMessage"] = $e->errorInfo;
            $this->result["errorMessage"] = "El producto $this->codigoBarras no pudo ser registrado porque ya existe";
            return $this->result;
        }
    }

    public function editarProductos ($idProductoSeleccionado) {
        try {
            $this->sql ="UPDATE 
                        TBL_PRODUCTOS 
                        SET
                            ProCodBarras        = :codigoBarras,
                            ProDescripcion      = :descripcion,
                            ProUbicacionFisica  = :ubicacionFisica,
                            ProPresentacion     = :presentacion,
                            ProUnidadMedida     = :unidadMedida,
                            ProPrecioVenta      = :precioVenta,
                            ProLaboratorio      = :laboratorio,
                            ProRegSanInvima     = :invima,
                            tbl_proveedores_ProNIT  = :nitProveedor
                        WHERE 
                            ProCodBarras = :codigoBarrasProductoSeleccionado
                        ";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->bindValue(":codigoBarras",$this->codigoBarras);
            $this->PDOStmt->bindValue(":descripcion",$this->descripcion);
            $this->PDOStmt->bindValue(":ubicacionFisica",$this->ubicacionFisica);
            $this->PDOStmt->bindValue(":presentacion",$this->presentacion);
            $this->PDOStmt->bindValue(":unidadMedida",$this->unidadMedida);
            $this->PDOStmt->bindValue(":precioVenta",$this->precioVenta);
            $this->PDOStmt->bindValue(":laboratorio",$this->laboratorio);
            $this->PDOStmt->bindValue(":invima",$this->invima);
            $this->PDOStmt->bindValue(":nitProveedor",$this->nitProveedor);
            $this->PDOStmt->bindValue(":codigoBarrasProductoSeleccionado",$idProductoSeleccionado);

            $this->PDOStmt->execute();

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["resultMessage"] = $this->PDOStmt->rowCount() != 0
                                            ? "Producto editado correctamente"
                                            : "El producto $idProductoSeleccionado no pudo ser editado porque no esta registrado en el sistema.";
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["errorPDOMessage"] = $e->errorInfo;
            $this->result["errorMessage"] = "El producto no pudo ser editado porque el codigo de barras $this->codigoBarras ya esta registrado en otro producto, por favor intenta modificar el valor con un codigo de barras distinto a los demas productos";
            return $this->result;
        }
    }

    public function eliminarProducto () {

        try {
            $this->sql = "DELETE FROM TBL_PRODUCTOS WHERE proCodBarras = ?";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->execute(array($this->codigoBarras));

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["resultMessage"] = $this->PDOStmt->rowCount() != 0 
                                            ? "El producto $this->codigoBarras se inhabilito correctamente"
                                            : "No se encontro ningun producto, por lo tanto no se pudo realizar el proceso de inhabilitacion";
            return $this->result;

        }catch(PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["errorPDOMessage"] = $e->errorInfo;
            if($e->errorInfo[1] == 1451) $this->result["errorMessage"] = "El producto $this->codigoBarras no pudo ser inhabilitado porque la infomacion de este producto es fundamental para el funcionamiento de otras secciones del sistema.";
            return $this->result;
        }
    }

    /*Metodos getter*/

    public function getCodigoBarras () {return $this->codigoBarras;}
    public function getDescripcion () {return $this->descripcion;}
    public function getUbicacionFisica () {return $this->ubicacionFisica;}
    public function getPresentacion () {return $this->presentacion;}
    public function getUnidadMedida () {return $this->unidadMedida;}
    public function getPrecioVenta () {return $this->precioVenta;}
    public function getLaboratorio  () {return $this->laboratorio;}
    public function getInvima () {return $this->invima;}
    public function getNitProveedor () {return $this->nitProveedor;}
    public function getNomProveedor () {return $this->nomProveedor;}

    /*Metodos setter*/

    public function setCodigoBarras ($value) {
        $this->codigoBarras = $value;
    }
    public function setDescripcion ($value) {
        $this->descripcion = $value;
    }
    public function setUbicacionFisica ($value) {
        $this->ubicacionFisica = $value;
    }
    public function setPresentacion ($value) {
        $this->presentacion = $value;
    }
    public function setUnidadMedida ($value) {
        $this->unidadMedida = $value;
    }
    public function setPrecioVenta ($value) {
        $this->precioVenta = $value;
    }
    public function setLaboratorio ($value) {
        $this->laboratorio = $value;
    }
    public function setInvima ($value) {
        $this->invima = $value;
    }
    public function setNitProveedor ($value) {
        $this->nitProveedor = $value;
    }
    public function setNomProveedor ($value) {
        $this->nomProveedor = $value;
    }
}

?>