<?php
session_start();


$dato= isset($_POST["busqueda"]) ? $_POST["busqueda"] : "";
$numero=0;

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
}
echo "<br>";
*/
$sql = "select * from pokemon";
$resultado = $conexion->query($sql);

function busqueda($resultado, $dato)
{
    if ($resultado->num_rows > 0) {//num rows me dice la cantidad de filas en la query
        while ($fila = $resultado->fetch_assoc()) {//fetch assoc nos devuelve el resultado de una fila como un array asociativo
            if (is_numeric($dato)) {
                if ($dato == $fila["numero"]) {
                    echo "numero: " . $fila["numero"] . " " . "nombre: " . $fila["nombre"] . "tipo: " . $fila["tipo"] . "<br>" . "<br>";
                }
            }
            if ($dato == $fila["nombre"]) {
                echo "numero: " . $fila["numero"] . " " . "nombre: " . $fila["nombre"] . " tipo: " . $fila["tipo"] . "<br>" . "<br>";

            }
            if ($dato == $fila["tipo"]) {
                echo "numero: " . $fila["numero"] . " " . "nombre: " . $fila["nombre"] . "tipo: " . $fila["tipo"] . "<br>" . "<br>";

            }
            /*if ($dato !=$fila["numero"] && $dato != $fila["nombre"]&& $dato != $fila["tipo"]){
                sesionIniciada();
            }*/
        }
    } else {
        echo "0 results";
    }

}

function sesionIniciada(){
    if(isset($_SESSION["usuario"])){
        header("location:indexAdmi.php");
        exit();
    }else {
        header("location:index.php");
        exit();
    }
}

busqueda($resultado, $dato);

$conexion->close();
/*

    //conectar con el servidor de bases de datos
    //seleccionar una base de datos


    //enviar la instruccion sql a la base de datos
    $sql = "select * from empleado";

    //trae las consultas fila por fila
    $resultado = $conexion->query($sql);//traigo la query

    if ($resultado->num_rows > 0) {//num rows me dice la cantidad de filas en la query
        while ($fila = $resultado->fetch_assoc()) {//fetch assoc nos devuelve el resultado de una fila como un array asociativo
            echo "dni: " . $fila["dni"] . " " . "nombre: " . $fila["nombre"] . "<br>" . "<br>";
        }
    } else {
        echo "0 results";
    }


    //inserta a la base
    $sql = "insert into empleado(dni,nombre)value (6345,'evemaga')";
    $resultado = $conexion->query($sql);



    //cerrar conexion
    $conexion->close();//cierro la conexion

*/






?>
