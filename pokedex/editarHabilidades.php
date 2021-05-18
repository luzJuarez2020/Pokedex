
<?php
require ("headerAdmi.php");
?>
<div class="w3-main w3-center" style="background-color: #e8c7c7;margin:40px">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pokemones";
$port = "3307";
$conexion = new mysqli($servername, $username, $password, $database, $port);

$sql = "select * from pokemon";
$resultado = $conexion->query($sql);

$numeroRecibido=$_GET["numero"];


if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
            if($fila["numero"]==$numeroRecibido){
                $tipo="";
                $dir = "./logos";
                if (is_dir($dir)) {
                    $log = scandir($dir);
                    for ($i = 0; $i < count($log); $i++) {
                        $nombreLog = $fila["tipo"]. ".png";
                        if ($nombreLog == $log[$i]) {
                            $tipo="<img src='$dir/$nombreLog' style='width: 65px'>";

                        }
                    }
                }
                $link=$fila['imagenLink'];
                echo "<img src='$link' style='width: 300px'>"."<br><br>";
                echo "numero de pokemon: ".$fila["numero"]."<br> nombre: ".$fila["nombre"]."<br> tipo: ".$tipo."\n";
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
        <option value="HidroBomba">HidroBomba</option>
        <option value="Trueno">Trueno</option>
        <option value="Ascuas">Ascuas</option>
        <option value="Latigo Cepa">Latigo Cepa</option>
        <option value="Roca Afilada">Roca Afilada</option>
        <option value="Hiper Rayo">Hiper Rayo</option>
        <option value="Placaje">Placaje</option>
        <option value="Furia Dragon">Furia Dragon</option>
    </select>
    </label>
    <button type='submit' name= 'modificar' class='button'>Editar</button></a>
</form>
<br>
</div>
<?php


require("footer.php");

?>

