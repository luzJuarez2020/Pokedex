<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";
$conectar = new mysqli($servername, $username, $password, $database, $port);
$sql = "select * from pokemon";
$resultado = $conectar->query($sql);
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

    .button{
        background-color: #f44336 ;
        color: white;
        border: 2px solid #f44336;
        margin-right: 10px;
    }

    .button:hover {
        background-color: white;
        color: black;
    }

</style>

<body class="w3-light-grey w3-content" style="max-width:1900px">

<header id="portfolio" class="w3-row" >
    <div class="w3-col s4 w3-center" style="padding: 1%">
        <img src="logos/pokebola.png" width="8%" height="5%">
    </div>
    <div class="w3-col s4 w3-center" >
        <h1 ><b>POKEDEX</b></h1>
    </div >
    <div class="w3-col s4 w3-center" style="text-align: center; height: 4%">
        <p style="margin: 0">usuario admi</p>
        <a href='cerrarSesion.php'><button type='submit'  class='button'>Cerrar sesion</button></a>
    </div>

</header>

<div class="w3-container">
    <form action="mostrarPokemon.php" method="post">
        <input  class="w3-input w3-border" type="text" name="busqueda" id="busqueda" placeholder="Ingrese el nombre, tipo o numero de pokemon" size=100 maxlength=80>
        <button type="submit"  class="button">Quien es este pokemon</button>
    </form>
</div>


<table class="w3-table  w3-centered w3-border-red" style="margin-top: 15px">
    <thead>
    <tr >
        <th class=" w3-border w3-border-red">Imagen</th>
        <th class=" w3-border w3-border-red">Tipo</th>
        <th class=" w3-border w3-border-red">Numero</th>
        <th class=" w3-border w3-border-red">Nombre</th>
        <th class=" w3-border w3-border-red">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while($filas = $resultado->fetch_assoc()){
        ?>
        <tr>
            <td class=" w3-border w3-border-red" ">
                <?php
                $link=$filas['imagenLink'];

                echo "<img src='$link' style='width: 65px'>"?>
            </td>
            <td class=" w3-border w3-border-red" ">
                <?php $dir = "./logos";
                if (is_dir($dir)) {
                    $log = scandir($dir);
                    for ($i = 0; $i < count($log); $i++) {
                        $nombreLog = $filas['tipo'] . ".png";
                        if ($nombreLog == $log[$i]) {
                            echo "<img src='$dir/$nombreLog' style='width: 65px'>";
                        }
                    }
                } ?>
            </td>
            <td class=" w3-border w3-border-red" style="font-size: 30px; font-weight: bold ">
                <?php echo $filas['numero'] ?>
            </td>
            <td class=" w3-border w3-border-red"style="font-size: 30px; font-weight: bold ">
                <?php
                $var=$filas['nombre'];
                echo "<a style='text-decoration: none' href='cadaPokemon.php?nombre=$var'>$var</a>";

                ?>
            </td>
            <td class=" w3-border w3-border-red">
                <?php
                $var=$filas["numero"];
                echo "<a href='editarHabilidades.php?numero=$var'>"."<button type='submit'  class='button'>Habilidades</button></a>";
                echo "<a href='eliminarPokemon.php?numero=$var'>"."<button type='submit'  class='button'>Eliminar</button></a>";
                ?>
            </td>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<br>
<div class="w3-border w3-center ">
    <a href="nuevoPokemon.php"><button type="button" class="button" style="width: 100%">Nuevo Pokemon</button></a>
</div>
<br>


<?php


require ("footer.php");

?>
