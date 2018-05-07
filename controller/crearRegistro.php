<?php

require_once("../model/Data.php");

$nombre = $_REQUEST["txtNombre"];
$etiquetas = $_REQUEST["txtEtiquetas"];

$d = new Data();

$arrayEtiquetas = explode(",", $etiquetas);


foreach ($arrayEtiquetas as $item) {

    $query = "CALL agregar_personas ('$nombre','$item')";
    $d->ejecutarQuery($query);
}

header("location: ../view/listado.php");

