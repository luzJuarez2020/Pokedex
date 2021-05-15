<?php
require ("header.php");
$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";
$conectar = new mysqli($servername, $username, $password, $database, $port);
$sql = "select * from pokemon";
$resultado = $conectar->query($sql);
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
   <?php /*
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pokemones";
    $port = "3307";
    $conectar = new mysqli($servername, $username, $password, $database, $port);
   $sql = "select * from pokemon";

   $result = $conectar->query($sql);
   if ($result->num_rows > 0) {
       while($fila = $result->fetch_assoc()) {
           echo "Numero: " . $fila["numero"]. " - Nombre: " . $fila["nombre"]. " - Tipo: " . $fila["tipo"]. "<br>";
           $link=$fila["imagenLink"];
           echo "<img src='$link'>";
       }
   }
   $conectar->close();*/
    ?>



    <table class="w3-table  w3-centered w3-border-red" style="margin-top: 15px">
        <thead>
        <tr >
            <th class=" w3-border w3-border-red">Imagen</th>
            <th class=" w3-border w3-border-red">Tipo</th>
            <th class=" w3-border w3-border-red">Numero</th>
            <th class=" w3-border w3-border-red">Nombre</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($filas = $resultado->fetch_assoc()){
            ?>
            <tr>
                <td class=" w3-border w3-border-red" >
                    <?php
                    $link=$filas['imagenLink'];

                    echo "<img src='$link' style='width: 65px'>";?>
                </td>
                <td class=" w3-border w3-border-red" >
                    <?php echo $filas['tipo'] ?>
                </td>
                <td class=" w3-border w3-border-red" style="font-size: 30px; font-weight: bold">
                    <?php echo $filas['numero'] ?>
                </td>
                <td class=" w3-border w3-border-red"style="font-size: 30px; font-weight: bold ">
                    <?php echo $filas['nombre'] ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <!-- Footer -->
<?php
require ("footer.php");
?>








