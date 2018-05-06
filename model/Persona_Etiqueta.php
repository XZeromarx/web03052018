<?php
class Persona_Eiqueta{
    private $id_Persona;
    private $id_Etiqueta;
    
    function __construct($id_Persona,$id_Etiqueta) {
        
        $this->id_Persona = $id_Persona;
        $this->id_Etiqueta = $id_Etiqueta;
        
    }
    
    function getId_Persona() {
        
        return $this->id_Persona;
        
    }


    function getId_Etiqueta() {
        
        return $this->id_Etiqueta;
        
    }


    function setId_Persona($id_Persona) {
        
        $this->id_Persona = $id_Persona;
        
    }

    function setId_Etiqueta($id_Etiqueta) {
        
        $this->id_Etiqueta = $id_Etiqueta;
        
    }
    
}