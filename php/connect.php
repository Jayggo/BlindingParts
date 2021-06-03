<?php

class conexion{ 

    private $conn;

    public function __construct(){//CREO EL CONSTRUCTOR CON LA VARIABLE QUE ALMACENA LA CONEXION

        $this->conn = new mysqli("localhost","root","", "blindingparts");
    
    }

    public function conectar(){ // VALIDO SI LA CONEXION TIENE ALGUN ERROR

        if (($this->conn)->connect_error){
    
            echo "<script>alert ('ERROR DE CONEXION A LA DB');</script>";
    
        }

    }

    public function getConn(){ // DEVUELVO LA CONEXION

        return $this->conn;

    }

}

$conexion = new conexion(); // CREO UN NUEVO OBJETO

$conexion->conectar(); 


?>