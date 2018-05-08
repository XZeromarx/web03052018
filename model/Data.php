<?php

require_once("Conexion.php");

class Data {

    private $con;

    public function __construct() {
        $this->con = new Conexion("bd_web");
    }

    public function ejecutarQuery($query) {

        $this->con->conectar();
        $this->con->ejecutar($query);
        $this->con->desconectar();
    }

    public function listarEtiquetas() {

        $this->con->conectar();
        $rs = $this->con->ejecutar("SELECT * FROM etiqueta;");
        $this->con->desconectar();
        return $rs;
    }

    public function listarPersona() {

        $this->con->conectar();

        $rs = $this->con->ejecutar("SELECT reg.id AS 'ID', p.nombre AS 'nombre' FROM persona_etiqueta reg
                                    INNER JOIN persona p ON reg.id_persona = p.id
                                    WHERE reg.id_persona = p.id;");

        $this->con->desconectar();
        return $rs;
    }
    
    
    
    public function etiquetaPers($idPersona){
        $this->con->conectar();
        $rs =$this->con->ejecutar("SELECT nombrePersona(".$idPersona.") AS 'rs';");
        $this->con->desconectar();
        return $rs;
        
    }

}
