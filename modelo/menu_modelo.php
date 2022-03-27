<?php

class MenuModelo extends ConexionBD{

    private $documentoUsuario;

    public function __construct () {
        parent::__construct();
    }

    public function obtenerTodosLosDatos(){}

    public function buscarUsuarioEnSesion() {
        $this->sql="SELECT 
                    EmpDocIdentidad,
                    EmpNombre,
                    EmpApellido,
                    EmpEps,
                    EmpRH,
                    EmpDireccion,
                    EmpTelefono,
                    EmpCorreo,
                    EmpRol
                    FROM tbl_empleados 
                    WHERE 
                    EmpDocIdentidad = ?";
        $this->PDOStmt = $this->connection->prepare($this->sql);
        $this->PDOStmt->execute(array($this->documentoUsuario));

        return $this->PDOStmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    //Metodos Getter
    public function getDocumentoUsuario () {return $this->documentoUsuario;}
    
    //Metodos Setter
    public function setDocumentoUsuario ($value) {
        $this->documentoUsuario = $value;
    }
}

?>