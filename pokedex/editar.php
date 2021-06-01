<?php
/*
include "editarHabilidades.php";


$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";
$conexion = new mysqli($servername, $username, $password, $database, $port);
$numero=$_GET["num"];

$sql = "select * from pokemon";
$resultado = $conexion->query($sql);

$habilidad=$_GET["habilidades"];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        if($fila["numero"]==$numero){
            $sql = "UPDATE pokemon SET habilidad='$habilidad' WHERE numero='$numero'";
            $resultado = $conexion->query($sql);
        }
    }
}
*/
?>
