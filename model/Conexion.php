<?php
class Conexion{ /* creo la siguiente clase conexion */
    private $mysql;
    private $bdname;
    private $user;
    private $pass;

    public function __construct($bdname) { /* creo el constructor en donde le paso los parametros de la clase conexion*/
        $this->bdname =$bdname ;
        $this->user='root';
        $this->pass='chopper1234';
    }
    public function conectar(){
        $this->mysql= new mysqli('localhost',$this->user,$this->pass,$this->bdname);

    if (mysqli_connect_errno()) {
           printf("Error de conexión: %s\n", mysqli_connect_error());
                      
            exit();
     }
}
         
    public function ejecutar($query){
                  
    return $this->mysql->query($query);
    }
 
    public function desconectar(){
                   
    $this->mysql->close();
               }
    
           
           
    } 


?>