<?php 

class LoginModelo extends ConexionBD{
    
    private $documentoUsuario;
    private $passwordUsuario;
    private $rolUsuario;
    
    public function obtenerTodosLosDatos () {}

    public function buscarUsuario () {
        $this->sql ="SELECT * 
                    FROM tbl_empleados
                    WHERE
                    EmpDocIdentidad = :documentoUsuario AND
                    EmpPassword     = :passwordUsuario  AND
                    EmpRol          = :rolUsuario";
                    
        $this->PDOStmt = $this->connection->prepare($this->sql);
        
        $this->PDOStmt->bindValue(":documentoUsuario",$this->documentoUsuario);
        $this->PDOStmt->bindValue(":passwordUsuario",$this->passwordUsuario);
        $this->PDOStmt->bindValue(":rolUsuario",$this->rolUsuario);

        $this->PDOStmt->execute();

        $this->result["infoUsuario"] = $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($this->result["infoUsuario"]) != 0) {
            session_start();
            $_SESSION["usuario"]["documento"] = $this->result["infoUsuario"][0]["EmpDocIdentidad"];
            $_SESSION["usuario"]["nombre"] = $this->result["infoUsuario"][0]["EmpNombre"];
            $_SESSION["usuario"]["apellido"] = $this->result["infoUsuario"][0]["EmpApellido"];
            $_SESSION["usuario"]["rol"] = $this->result["infoUsuario"][0]["EmpRol"];
        }

        return $this->result;
    }

    /* METODOS GETTER */
    
    public function getDocumentoUsuario () {return $this->documentoUsuario;} 
    public function getPasswordUsuario () {return $this->passwordUsuario;} 
    public function getRolUsuario () {return $this->rolUsuario;} 
    
    /* METODOS SETTER */

    public function setDocumentoUsuario ($value) {
        $this->documentoUsuario = $value;
    }
    public function setPasswordUsuario ($value) {
        $this->passwordUsuario = $value;
    }
    public function setRolUsuario ($value) {
        $this->rolUsuario = $value;
    }
}

?>