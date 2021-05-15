<?php
session_start();
$dato= isset($_POST["busqueda"]) ? $_POST["busqueda"] : "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";
$conexion = new mysqli($servername, $username, $password, $database, $port);


$sql = "select * from pokemon";
$resultado = $conexion->query($sql);
$imprimir="";

function recorrer($resultado,$dato){
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            if (is_numeric($dato)) {
                if ($dato == $fila["numero"]) {
                    header("location:mostrarPokemon.php");
                    $imprimir = $fila["nombre"];
                }
            } else if ($dato == $fila["nombre"]) {
                header("location:mostrarPokemon.php");
                $imprimir .= $fila["nombre"];
            } else if ($dato == $fila["tipo"]) {
                header("location:mostrarPokemon.php");
                $imprimir .= $fila["nombre"] . "<br>";
            }
        }
    }


    if ($imprimir == "") {
        if (isset($_SESSION["usuario"])) {
            header("location:indexAdmi.php");
            exit();
        } else {
            header("location:index.php");
            exit();
        }
    }
}

recorrer($resultado,$dato);


?>
