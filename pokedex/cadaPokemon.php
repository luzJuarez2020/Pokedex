<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";
$conectar = new mysqli($servername, $username, $password, $database, $port);
$sql = "select * from pokemon";
$resultado = $conectar->query($sql);
$variableRecibida = null;


if(isset($_GET["nombre"])) {
    $variableRecibida=$_GET["nombre"];
}

function obtenerPokemon($variableRecibida, $resultado) {
    if ($resultado->num_rows >0) {
        while($fila=$resultado->fetch_assoc()) {
            if($variableRecibida == $fila["nombre"]) {
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


                echo "<div class='w3-container ' style='background-color:#e8c7c7 ; width: 90%;margin: 0 auto 0;margin-bottom: 20px' >";
                echo "<br>";
                echo "<img class='w3-round w3-animate-top' src='$imagen' style='width: 18%'>";
                echo "<h5 class='w3-opacity' style='font-size: 30px'>Numero: $numero </h5>";
                echo "<h1 style='font-weight:bold;font-size: 60px'>$nombre </h1>";
                echo "<h3 >Tipo: $tipo</h3>";
                echo "<h3 >Numero: $numero</h3>";
                echo "<h3 >Habilidad: $habilidad</h3>";
                echo "<p style='font-size: 18px'>$descripcion</p>";
                echo "</div>";


            }
        }
    }
}


require ("headerAdmi.php");

obtenerPokemon($variableRecibida, $resultado);

require ("footer.php");

?>

