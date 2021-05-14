
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

<div class="w3-container">
    <form action="procesarbusqueda.php" method="post">
        <input  class="w3-input w3-border" type="text" name="busqueda" id="busqueda" placeholder="Ingrese el nombre, tipo o numero de pokemon" size=100 maxlength=80>
        <button type="submit" >Quien es este pokemon</button>
    </form>
</div>

<table class="w3-table  w3-border w3-centered">
    <tr >
        <th class=" w3-border">Imagen</th>
        <th class=" w3-border">Tipo</th>
        <th class=" w3-border">Numero</th>
        <th class=" w3-border">Nombre</th>
        <th class="w3-border">Habilidades</th>
        <th class="w3-border">Quitar</th>
    </tr>
    <tr>
        <td class=" w3-border">
            <img src="Bulbasaur.png" height="100px">
        </td>
        <td class=" w3-border">
            <img src="logo_planta.png " height="30px">
        </td>
        <td class=" w3-border" style="font-size: 30px; font-weight: bold">
            226
        </td>
        <td class=" w3-border"style="font-size: 30px; font-weight: bold">
            bulbasaur
        </td>
        <td class=" w3-border"style="font-size: 30px; font-weight: bold">
            <button type="button">Modificar</button>
        </td>
        <td class=" w3-border"style="font-size: 30px; font-weight: bold">
            <button type="button">Baja</button>
        </td>
    </tr>

</table>



<div class="w3-border w3-center ">
    <a href="nuevoPokemon.php"><button type="button" style="width: 100%">Nuevo Pokemon</button></a>
</div>






<?php


require ("footer.php");

?>
