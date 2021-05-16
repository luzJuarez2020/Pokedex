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
    .button{
        background-color: #f44336 ;
        color: white;
        border: 2px solid #f44336;
    }

    .button:hover {
        background-color: white;
        color: black;
    }

</style>

<body class="w3-light-grey w3-content" style="max-width:1900px">

<header id="portfolio" class="w3-row">
    <div class="w3-col s4 w3-center">
        <img src="leo.png" height="150px">
    </div>
    <div class="w3-col s4 w3-center">
        <h1><b>POKEDEX</b></h1>
    </div>
    <div class="w3-col s4 w3-center" style="padding-top: 25px">
    </div>

</header>
<div class="w3-main w3-center" style="margin:40px">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3306 ";
$conexion = new mysqli($servername, $username, $password, $database, $port);

$sql = "select * from pokemon";
$resultado = $conexion->query($sql);

$numeroRecibido=$_GET["numero"];


if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
            if($fila["numero"]==$numeroRecibido){
                $link=$fila['imagenLink'];
                echo "<img src='$link' style='width: 300px'>"."<br><br>";
                echo "numero de pokemon: ".$fila["numero"]."<br> nombre: ".$fila["nombre"]."<br> tipo: ".$fila["tipo"]."\n";
            }
    }
}

if(isset($_POST['modificar'])){
    $id = $_GET['numero'];
    $habilidad = $_POST['habilidades'];
    $sqlUpdate = "UPDATE pokemon SET habilidad = '$habilidad' WHERE numero = $id";
    $conexion->query($sqlUpdate);
    $_SESSION['message'] = "Habilidad modificada exitosamente";
    header("Location: indexAdmi.php");
}
?>
    <br><br>
<form method="POST" action="editar.php?numero=<?php echo $_GET['numero']; ?>">
    <label>Seleccionar la habilidad a editar:
    <select name="habilidades">
        <option value="">Seleccione Habilidad</option>
        <option value="absorbeAgua">Absorbe agua</option>
        <option value="absorbeElectricidad">Absorbe electricidad</option>
        <option value="absorbeFuego">Absorbe fuego</option>
        <option value="latigoCepa">Latigo cepa</option>
        <option value="cabezaRoca">cabezaRoca</option>
        <option value="electricidadEstatica">Electricidad estatica</option>
        <option value="enjambre">Enjambre</option>
        <option value="inmunidad">Inmunidad</option>
    </select>
    </label>
    <button type='submit' name= 'modificar' class='button'>Editar</button></a>
</form>
<br>
</div>
<?php


require("footer.php");

?>

