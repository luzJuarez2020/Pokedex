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
    <div class="w3-col s4 w3-center">
        <img src="leo.png" height="150px">
    </div>
    <div class="w3-col s4 w3-center" >
        <h1 ><b>POKEDEX</b></h1>
    </div >
    <div class="w3-col s4 w3-center" style="padding-top: 25px">
        <p>usuario admi</p>
    </div>

</header>

<div class="formulario w3-main w3-center" style="padding=30px">
    <h4>Ingrese un nuevo pokemon<h4><br>
    <form action="agregarPokemon.php" method="post">
        <label>Link de la imagen: <br><input type="text" name="img" placeholder="link imagen" style="width: 80%;"></label><br><br>
        <label>Nombre: <br><input type="text" name="nombre" placeholder="nombre" style="width: 80%;"></label><br><br>
        <label> Seleccione el tipo:
        <select name="tipo" id="tipo">
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
        <label>Habilidad: <br><input type="text" name="habilidad" placeholder="habilidad" style="width: 80%;"></label><br><br>
        <button type="submit" class="button" style="width: 80%;">agregar</button>
    </form>
</div>




<?php
require ("footer.php");
?>