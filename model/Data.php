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

    public function listarPersonaEtiquetas() {

        $this->con->conectar();

        $rs = $this->con->ejecutar("SELECT reg.id AS 'ID', p.nombre AS 'Nombre Persona', e.nombre AS 'Etiqueta' FROM persona_etiqueta reg
INNER JOIN persona p ON reg.id_persona = p.id
INNER JOIN etiqueta e ON reg.id_etiqueta = e.id
WHERE reg.id_persona = p.id AND
reg.id_etiqueta = e.id;");

        $this->con->desconectar();
        return $rs;
    }

}
