<?php
session_start();
if (empty($_SESSION["username"])) {
    header("Location: ../vista/login.php");
    exit();
}
echo "<h1>Rol admin logueado </h1>" ;

/*echo "<br>"."Listado de Usuarios"."<br>";
// Abriendo el archivo
$archivo = fopen("../modelo/datos.txt", "r");
 
// Recorremos todas las lineas del archivo
while(!feof($archivo)){
    // Leyendo una linea
    $traer = fgets($archivo);
    // Imprimiendo una linea
    echo nl2br($traer);
}
 
// Cerrando el archivo
fclose($archivo);*/

const GUARDAR = 'Guardar';
const VER_DATOS = 'Ver datos';
$datos = [];
$nombre = $_POST['username'] ?? null;
$contraseña = $_POST['contraseña'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operacion'])){
  if($_POST['operacion'] === GUARDAR){
      $file = @fopen("../modelo/datos.txt", "a");        
      fwrite($file, "$nombre,$contraseña".PHP_EOL);
      fclose($file);
      //Limpiar formulario
      $nombre = null;
      $apellido = null;
  } else {
      if(file_exists('../modelo/datos.txt')){
          $content = trim(file_get_contents('../modelo/datos.txt'), PHP_EOL);
          $lineas = explode(PHP_EOL, $content);
          foreach($lineas as $linea){
              list($name, $pass) = explode(',', $linea);
              $datos[] = ['username' => $name, 'contraseña' => $pass];
          }
      }
  }
}

//Cuerpo de la página
$body = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Formulario</title>
    <style type="text/css">
    </style>
    </head>

    <body bgcolor="#FFFFFF">
    <FORM method="post" name="formulario" autocomplete="off">
    Nombre:<input type="text" name="username" id="username">

    Contraseña: <input type="password" name="contraseña" id="contraseña">

    <br /><br />
    <input type="submit" value="'.GUARDAR.'" name="operacion">
    <input type="submit" value="'.VER_DATOS.'" name="operacion">

    </FORM>';

if(!empty($datos)){
    $body .= '

        <h3>Listado de Usuarios</h3>
        <br />
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Contraseña</th>
            </tr>
    ';
    foreach($datos as $elemento){
        $body .= '
            <tr><td>'.$elemento['username'].'</td><td>'.$elemento['contraseña'].'</td></tr>
        ';
    }
    $body .= '</table>';
}

//Mostrar pagina
echo $body;
?>
<p></p>
<a href="../vista/login.php">Cerrar sesión</a>