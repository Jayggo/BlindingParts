<?php

    session_start();
    
    if (isset($_SESSION['id']) && isset($_GET['id_repuesto'])){

        $id_usuario = $_SESSION['id'];
        $id_repuesto = $_GET['id_repuesto'];
        $fecha_asignacion = date("d-m-Y, h:i:s A");

        try { 
            require_once('connect.php');

            $connect = $conexion->getConn();
            $sql = "INSERT INTO usuario_repuesto (id_usuario, id_repuesto, fecha_asignacion) VALUES ('$id_usuario', '$id_repuesto','$fecha_asignacion')";

            $resultado = $connect->query($sql);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }

        if ($resultado){
            
            header("location: historial.php");

        }else{

            echo "Ocurrio un error";

        }


    }else{

        header("location: ../index.php");

    }

    mysqli_close($connect);
?>