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
    } else{
        if (isset($_SESSION["usuario"])) {
           // header("location:indexAdmi.php");
            echo "<script>alert('pokemon no encontrado '); window.location='indexAdmi.php'</script>";
        } else {
            //header("location:index.php");
            echo "<script>alert('pokemon no encontrado '); window.location='index.php'</script>";
        }
    }
}
?>



<?php
require ("headerAdmi.php");

mostrarResultado($resultado);

require ("footer.php");

?>


