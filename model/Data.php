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
}