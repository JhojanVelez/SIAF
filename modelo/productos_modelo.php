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
            $this->rows['infoProductos'] = $this->connection->query("SELECT * FROM productos ORDER BY ProDescripcion")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProveedores'] = $this->connection->query("SELECT ProNIT,ProNombre FROM tbl_proveedores ORDER BY ProNombre")->fetchAll(PDO::FETCH_ASSOC);
            $this->rows['infoProductosInhabilitados'] = $this->connection->query("SELECT * FROM tbl_productos_inhabilitados ORDER BY ProFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
            return $this->rows;
        } catch (PDOException $e) {
            return "Error al obtener todos los productos";
        }
    }

    public function buscarInhabilitados () {
        try {
            return $this->connection->query("SELECT * FROM tbl_productos_inhabilitados ORDER BY ProFechaInhabilitacion DESC")->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error al obtener todos los productos inhabilitados";
        }
    }

    public function buscarPorId ($id) {
        $this->PDOStmt = $this->connection->prepare("SELECT * FROM productos WHERE ProCodBarras = ?");
        $this->PDOStmt->execute(array($id));
        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorAtributos () {
        $this->sql ="SELECT * 
                    FROM productos
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

    public function registrar () {
        try {
            $this->sql ="INSERT INTO 
                        tbl_productos
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

            if($this->PDOStmt->errorInfo()[1] == 1062) throw new PDOException;
            if($this->PDOStmt->errorInfo()[1] == 1406) throw new PDOException;

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();

            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1062) $this->result["errorMessage"] = "El producto $this->codigoBarras no pudo ser registrado porque ya existe";
            if($this->PDOStmt->errorInfo()[1] == 1406) $this->result["errorMessage"] = "La informacion no pudo ser registrada porque algun campo excedio la cantidad maxima de caracteres permitidos";
            return $this->result;
        }
    }

    public function editar ($idProductoSeleccionado) {
        try {
            $this->sql ="UPDATE 
                        tbl_productos
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
            
            if($this->PDOStmt->errorInfo()[1] == 1062) throw new PDOException;
            if($this->PDOStmt->errorInfo()[1] == 1406) throw new PDOException;
            
            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            
            return $this->result;

        } catch (PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1062) $this->result["errorMessage"] = "El producto no pudo ser editado porque el codigo de barras $this->codigoBarras ya esta registrado en otro producto, por favor intenta modificar el valor con un codigo de barras distinto a los demas productos.";
            if($this->PDOStmt->errorInfo()[1] == 1406) $this->result["errorMessage"] = "La informacion no pudo ser editada porque algun campo excedio la cantidad maxima de caracteres permitidos";
            return $this->result;
        }
    }

    public function eliminar ($id = "") {
        $this->setCodigoBarras(htmlentities(addslashes($id)));
        try {
            $this->sql = "DELETE FROM tbl_productos WHERE proCodBarras = ?";

            $this->PDOStmt = $this->connection->prepare($this->sql);

            $this->PDOStmt->execute(array($this->codigoBarras));
            
            if($this->PDOStmt->errorInfo()[1] == 1451) throw new PDOException;

            $this->result["complete"] = true;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            $this->result["resultMessage"] = $this->PDOStmt->rowCount() != 0 
                                            ? "El producto $this->codigoBarras se inhabilito correctamente"
                                            : "No se encontro ningun producto, por lo tanto no se pudo realizar el proceso de inhabilitacion";
            return $this->result;

        }catch(PDOException $e) {
            $this->result["complete"] = false;
            $this->result["affectedRows"] = $this->PDOStmt->rowCount();
            $this->result["PDOMessage"] = $this->PDOStmt->errorInfo();
            if($this->PDOStmt->errorInfo()[1] == 1451) $this->result["errorMessage"] = "El producto $this->codigoBarras no pudo ser inhabilitado porque la infomacion de este producto es fundamental para el funcionamiento de otras secciones del sistema.";
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