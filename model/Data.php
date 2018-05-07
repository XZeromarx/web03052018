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

        $rs = $this->con->ejecutar("SELECT pe.id AS 'ID', p.nombre AS 'Nombre Persona', e.nombre AS 'Etiqueta' FROM persona_etiqueta"
                . "                 INNER JOIN persona_etiqueta pe ON pe.id_persona = p.id"
                . "                 INNER JOIN persona_etiqueta pe ON pe.id_etiqueta = e.id"
                . "                 WHERE pe.id_persona = p.id AND"
                . "                 pe.id_etiqueta = e.id;");

        $this->con->desconectar();
        return $rs;
    }

}
