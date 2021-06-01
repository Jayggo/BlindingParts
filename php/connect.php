<?php

class conexion{

    private $conn;

    public function __construct(){

        $this->conn = new mysqli("localhost","root","", "blindingparts");
    
    }

    public function conectar(){ 

        if (($this->conn)->connect_error){
    
            echo "<script>alert ('ERROR DE CONEXION A LA DB');</script>";
    
        }

    }

    public function getConn(){ 

        return $this->conn;

    }

}

$conexion = new conexion();

$conexion->conectar(); // Valida que no tenga ningun error al conectarse.



?>