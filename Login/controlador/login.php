<?php

$usuario_correcto = "josemi";
$contraseña_correcta = "josemi";
$admin = "admin";
$adminPassword="admin";

$usuario = $_POST["username"];
$contraseña = $_POST["contraseña"];
if ($usuario === $usuario_correcto && $contraseña === $contraseña_correcta) {
    
    session_start();
    $_SESSION["username"] = $usuario;
    header("Location: inicio.php");

} elseif ($usuario === $admin && $contraseña === $adminPassword) {

    session_start();
    $_SESSION["username"] = $usuario;
    header("Location: registro.php");
    
}

else {
    echo "El usuario o la contraseña son incorrectos";
}
//4 ficheros mcv el administrador entra y ve todos los usuarios y puedo registrar uno nuevo 
//cuando lo desee con un enlace a nuevo mande al formulario y al aceptar vuelvo al listado
//si eres administrado el listado si sale si no el forumaliro
//otra ventana para el usuario normal
//un cerrar sesion
//fichero id nombre y rol
//helper

?>