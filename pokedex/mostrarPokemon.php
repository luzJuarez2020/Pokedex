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
           // header("location:indexAdmi.php");
            echo "<script>alert('pokemon no encontrado '); window.location='indexAdmi.php'</script>";
        } else {
            //header("location:index.php");
            echo "<script>alert('pokemon no encontrado '); window.location='indexAdmi.php'</script>";
        }
    }
}
?>



<?php
require ("headerAdmi.php");

mostrarResultado($resultado);

require ("footer.php");

?>


