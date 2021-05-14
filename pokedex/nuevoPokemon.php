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
</style>

<body class="w3-light-grey w3-content" style="max-width:1900px">

<header id="portfolio" class="w3-row" >
    <div class="w3-col s4">
        <img src="leo.png" height="150px">
    </div>
    <div class="w3-col s4" >
        <h1 ><b>POKEDEX</b></h1>
    </div >
    <div class="w3-col s4" style="padding-top: 25px">
        <p>usuario admi</p>
    </div>

</header>

<div class="formulario">
    <form action="agregarPokemon.php" method="post">
        <input type="text" name="img" placeholder="link imagen"><br>
        <input type="text" name="nombre" placeholder="nombre"><br>
        <select name="tipo" id="tipo">
            <option value="fuego">fuego</option>
            <option value="agua">agua</option>
            <option value="planta">planta</option>
            <option value="electrico">electrico</option>
            <option value="normal">normal</option>
            <option value="roca">roca</option>
            <option value="dragon">dragon</option>
        </select><br>
        <input type="text" name="numero" placeholder="numero"><br>
        <input type="text" name="descripcion" placeholder="descripcion"><br>
        <input type="text" name="habilidad" placeholder="habilidad"><br>
        <button type="submit">agregar</button>
    </form>
</div>




<?php
require ("footer.php");
?>