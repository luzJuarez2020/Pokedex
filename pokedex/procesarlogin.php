<?php
session_start();

$user=isset($_POST["usuario"])?$_POST["usuario"]:"";
$contrasenia=isset($_POST["contra"])?$_POST["contra"]:"";

if(validarusuario($user,$contrasenia)==true){
    $_SESSION["usuario"]=$user;
    header("location:indexAdmi.php");
    exit();
}else{
    echo "incorrecto";
}


function validarusuario($user,$contrasenia){/*ahorro base d datos*/
    return $user=="pablito" && $contrasenia=="1234";
}



?>
