<?php
session_start();
$dato= isset($_POST["busqueda"]) ? $_POST["busqueda"] : "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";
$conexion = new mysqli($servername, $username, $password, $database, $port);
/*if ($conexion->connect_error) {//nos devuelve si hubo un error de conexion
    echo "error en conexion";
} else {
    echo "conexion exitosa";
}*/
echo "<br>";
$sql = "select * from pokemon";
$resultado = $conexion->query($sql);
$imprimir="";
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        if(is_numeric($dato)){
            if($dato==$fila["numero"]){
                $imprimir= $fila["nombre"];
            }
        } else if($dato==$fila["nombre"]){
            $imprimir.= $fila["nombre"];
        } else if($dato==$fila["tipo"]){
            $imprimir.= $fila["nombre"]."<br>";
        }
    }
} else {
    echo "0 results";
}

if($imprimir==""){
    if(isset($_SESSION["usuario"])){
        header("location:indexAdmi.php");
        exit();
    }else {
        header("location:index.php");
        exit();
    }
}

echo $imprimir;

$conexion->close();




?>
