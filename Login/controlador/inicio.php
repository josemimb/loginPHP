<?php
//Iniciar sesión para usar $_SESSION
session_start();
//Y ahora leer si no hay algo llamado usuario en la sesión
if (empty($_SESSION["username"])) {
    //Lo redireccionamos al formulario de inicio de sesión
    header("Location: ../vista/login.php");
    //salimos del script
    exit();
}
echo "Se ha logeado con exito el usuario normal";
?>
<p></p>
<a href="../vista/login.php">Cerrar sesión</a>