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

        $rs = $this->con->ejecutar("SELECT * FROM persona;");

        $this->con->desconectar();
        return $rs;
    }

    public function etiquetaPers($idPersona) {
        echo 'asd';
        $this->con->conectar();
        $rs = $this->con->ejecutar("SELECT GROUP_CONCAT(e.nombre SEPARATOR ',') AS 'etiquetas'
                                    FROM persona_etiqueta pe
                                    INNER JOIN persona p ON p.id = pe.id_persona
                                    INNER JOIN etiqueta e ON e.id = pe.id_etiqueta
                                    WHERE
                                    p.id = '" . $idPersona . "' AND
                                    e.id = pe.id_etiqueta;");
        $this->con->desconectar();
        return $rs;
    }

}
