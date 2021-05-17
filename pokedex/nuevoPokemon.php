<?php
require ("headerAdmi.php");
?>

<div class="formulario w3-main w3-center" style="padding=30px">
    <h4 style="font-size: 30px;font-weight: bold;margin-top: 20px">Ingrese un nuevo pokemon<h4><br>
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
            <option value="absorbeAgua">Absorbe agua</option>
            <option value="absorbeElectricidad">Absorbe electricidad</option>
            <option value="absorbeFuego">Absorbe fuego</option>
            <option value="latigoCepa">Latigo cepa</option>
            <option value="cabezaRoca">cabezaRoca</option>
            <option value="electricidadEstatica">Electricidad estatica</option>
            <option value="enjambre">Enjambre</option>
            <option value="inmunidad">Inmunidad</option>
        </select>
        </label><br><br>
        <button type="submit" class="button" style="width: 80%;">agregar</button>
    </form>
</div>

<?php
require ("footer.php");
?>