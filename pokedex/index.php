<?php
require ("header.php");
?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin:40px">


    <div class="w3-container">
        <form action="procesarbusqueda.php" method="post">
            <input  class="w3-input w3-border" type="text" name="busqueda" id="busqueda" placeholder="Ingrese el nombre, tipo o numero de pokemon" size=100 maxlength=80>
            <button type="submit" >Quien es este pokemon</button>
        </form>
    </div>

    <!-- First Photo Grid-->

    <!-- Second Photo Grid-->
    <table class="w3-table  w3-border w3-centered">
        <tr >
            <th class=" w3-border">Imagen</th>
            <th class=" w3-border">Tipo</th>
            <th class=" w3-border">Numero</th>
            <th class=" w3-border">Nombre</th>
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
        </tr>

    </table>



    <!-- Footer -->
<?php
require ("footer.php");
?>








