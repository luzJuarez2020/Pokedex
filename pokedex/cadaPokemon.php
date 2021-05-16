<?php
require("header.php");
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
                $tipo = $fila["tipo"];
                $descripcion = $fila["descripcion"];
                $imagen = $fila["imagenLink"];
                $habilidad = $fila["habilidad"];

                echo "<div style='display:flex; flex-direction: row; Justify-content: center;>";
                echo "<div>";
                echo "<img src='$imagen' style='width: 400px'>";
                echo "</div>";
                echo "<div>";
                echo "<h1 style='font-weight:bold;font-size: 60px;margin-left: 50px'>$nombre</h1>";
                echo "<h3>$habilidad</h3>";
                echo "<p style='font-size: 18px'>$descripcion</p>";
                echo "</div>";
                echo "</div>";


            }
        }
    }
}


?>

<div class="w3-display-container">
    <div class="w3-display-topleft">

        <?php
        echo obtenerPokemon($variableRecibida, $resultado);
        ?>
    </div>

</div>

