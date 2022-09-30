<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form action="../controlador/login.php" method="post">
        <div class="form-element">
            <label>Nombre Usuario</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" placeholder="user" required  />
        </div>
        <div class="form-element">
            <label>Contraseña</label>
            <input type="password" name="contraseña" patter="[0-9]" required />
        </div>
        <button type="submit" name="login" value="login">Inciar Sesion</button>
    </form>
</body>
</html>