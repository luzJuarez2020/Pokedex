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

<header id="portfolio" class="w3-row" >
    <div class="w3-col s4 w3-center" style="padding: 1%">
        <img src="logos/pokebola.png" width="8%" height="5%">
    </div>
    <div class="w3-col s4 w3-center" >
        <h1 ><b>POKEDEX</b></h1>
    </div >
    <div class="w3-col s4 w3-center" style="padding-top: 25px">
    </div>

</header>

<div class="formulario w3-main w3-center" style="padding=30px">
    <h4 style="font-size: 30px;font-weight: bold;margin-top: 20px">Ingrese Un Nuevo Pokemon</h4><br>
            <?php
            session_start();
            if(isset($_SESSION['message'])){?>
                <div class="w3-panel w3-red w3-display-container">
                    <span onclick="this.parentElement.style.display='none'"class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Error al crear nuevo Pokemon</h3>
                    <p><?= $_SESSION['message'] ?></p>
                </div>
            <?php session_unset(); } ?>

            <h5></h5>
    <form action="agregarPokemon.php" method="post">
        <label>Link de la imagen: <br><input type="text" name="img" placeholder="link imagen" style="width: 80%;"></label><br><br>
        <label>Nombre: <br><input type="text" name="nombre" placeholder="nombre" style="width: 80%;"></label><br><br>
        <label> Seleccione el tipo:<br>
        <select name="tipo" id="tipo" style="width: 80%" >
            <option value="fuego">fuego</option>
            <option value="agua">agua</option>
            <option value="planta">planta</option>
            <option value="electrico">electrico</option>
            <option value="normal">normal</option>
            <option value="roca">roca</option>
            <option value="dragon">dragon</option>
        </select>
        </label><br><br>
        <label>Numero: <br><input type="text" name="numero" placeholder="numero" style="width: 80%;"></label><br><br>
        <label>Breve descripcion: <br><input type="text" name="descripcion" placeholder="descripcion" style="width: 80%;"></label><br><br>
        <label> Seleccione la habilidad:<br>
        <select name="habilidad" id="habilidad" style="width: 80%">
            <option value="Hidrobomba">Hidrobomba</option>
            <option value="Bola Voltio">Bola Voltio</option>
            <option value="Ascuas">Ascuas</option>
            <option value="Latigo Cepa">Latigo cepa</option>
            <option value="Golpe Roca">Golpe Roca</option>
            <option value="Ciclon">Ciclon</option>
            <option value="Enjambre">Enjambre</option>
            <option value="Inmunidad">Inmunidad</option>
        </select>
        </label><br><br>
        <button type="submit" class="button" style="width: 80%; margin-bottom: 10px;">agregar</button>
    </form>
</div>




<?php
require ("footer.php");
?>