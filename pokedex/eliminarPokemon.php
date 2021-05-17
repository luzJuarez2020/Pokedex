<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3306";

$conexion = new mysqli($servername, $username, $password, $database, $port);

if(isset($_GET['numero'])){
    $id = $_GET['numero'];
    $sql = "DELETE FROM pokemon WHERE numero = $id";
    $conexion->query($sql);
    header("Location: indexAdmi.php");
}

?>