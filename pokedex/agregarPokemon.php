<?php

$nombre=isset($_POST["nombre"])?$_POST["nombre"]:"";
$link=isset($_POST["img"])?$_POST["img"]:"";
$tipo=isset($_POST["tipo"])?$_POST["tipo"]:"";
$numero=isset($_POST["numero"])?$_POST["numero"]:"";
$descripcion=isset($_POST["descripcion"])?$_POST["descripcion"]:"";
$habilidad=isset($_POST["habilidad"])?$_POST["habilidad"]:"";


$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";

$conexion = new mysqli($servername, $username, $password, $database, $port);



$sql = "insert into pokemon(numero,nombre,tipo,descripcion,habilidad,imagenLink)value ('$numero','$nombre','$tipo','$descripcion','$habilidad','$link')";
$resultado = $conexion->query($sql);

$sql="select * from pokemon";
$resultado = $conexion->query($sql);//traigo la query

if ($resultado->num_rows > 0) {//num rows me dice la cantidad de filas en la query
    while ($fila = $resultado->fetch_assoc()) {//fetch assoc nos devuelve el resultado de una fila como un array asociativo
        echo "nombre: " . $fila["nombre"] . " " . "numero: " . $fila["numero"] . "<br>" . "<br>";
    }
} else {
    echo "0 results";
}

