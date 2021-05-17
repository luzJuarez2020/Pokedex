<?php
session_start();
$dato= isset($_POST["busqueda"]) ? $_POST["busqueda"] : "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";
$conexion = new mysqli($servername, $username, $password, $database, $port);

$sql = "select * from pokemon where numero = '$dato' or tipo = '$dato' or nombre = '$dato'";

$resultado = $conexion->query($sql);

function mostrarResultado($resultado){
    if ($resultado->num_rows >0) {
        while ($fila = $resultado->fetch_assoc()) {
            $nombre = $fila["nombre"];
            $tipo = "";
            $numero = $fila["numero"];
            $descripcion = $fila["descripcion"];
            $imagen = $fila["imagenLink"];
            $habilidad = $fila["habilidad"];

            $dir = "./logos";
            if (is_dir($dir)) {
                $log = scandir($dir);
                for ($i = 0; $i < count($log); $i++) {
                    $nombreLog = $fila["tipo"]. ".png";
                    if ($nombreLog == $log[$i]) {
                        $tipo="<img src='$dir/$nombreLog' style='width: 65px'>";

                    }
                }
            }

            echo "<div style='margin: 30px;padding: 10px;display: flex;flex-direction: column;text-align: left;background-color: #e8c7c7;margin-bottom: 20px'>";
            echo "<div style='display: flex;flex-direction: row'>";
            echo "<img src='$imagen' style='width: 150px'>";
            echo "<h1 style='font-weight:bold;font-size: 60px;margin-left: 50px'>$nombre </h1>";
            echo "</div>";
            echo "<h2 >Tipo: $tipo</h2>";
            echo "<h2 >Numero: $numero</h2>";
            echo "<h2 >Habilidad: $habilidad</h2>";
            echo "<p style='font-size: 18px'>$descripcion</p>";
            echo "</div>";
        }
    } else{
        if (isset($_SESSION["usuario"])) {
            header("location:indexAdmi.php");
            exit();
        } else {
            header("location:index.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<title>pokedex</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Raleway", sans-serif
    }
</style>

<body class="w3-light-grey w3-content" style="max-width:1900px">

<header id="portfolio" class="w3-row" >
    <div class="w3-col s4 w3-center">
        <img src="leo.png" height="150px">
    </div>
    <div class="w3-col s4 w3-center" >
        <h1 ><b>POKEDEX</b></h1>
    </div >
    <div class="w3-col s4 w3-center" style="padding-top: 25px">

    </div>
</header>


<?php

mostrarResultado($resultado);

?>


<?php

require ("footer.php");

?>


