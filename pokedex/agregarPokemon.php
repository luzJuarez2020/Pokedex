<?php
session_start();
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$link = isset($_POST["img"]) ? $_POST["img"] : "";
$tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : "";
$numero = isset($_POST["numero"]) ? $_POST["numero"] : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$habilidad = isset($_POST["habilidad"]) ? $_POST["habilidad"] : "";


$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";

$conexion = new mysqli($servername, $username, $password, $database, $port);


$sqlBusqueda = "select * from pokemon where numero = $numero";
$resultadoBusqueda = $conexion->query($sqlBusqueda);//traigo la query

if ($resultadoBusqueda->num_rows <= 0) {
    $sql = "insert into pokemon(numero,nombre,tipo,descripcion,habilidad,imagenLink)value ('$numero','$nombre','$tipo','$descripcion','$habilidad','$link')";
    $resultado = $conexion->query($sql);
    header("Location: indexAdmi.php");
    exit();
} else {
    $_SESSION['message'] = "El Numero de Pokemon " . $numero . " ya existe en la base";
    header("Location: nuevoPokemon.php");
    exit();
}


header("location: indexAdmi.php");


?>