<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0dd36181c0.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="estiloLogin.css">
    
</head>
<body>
    <form class="form" action="validarLogin.php" method="post">

    <div class="contenedor">
    <h1>Inicia sesión</h1>
        <div class="separador">
        <i class="fa-solid fa-envelope icon"></i>
        <input type="text" id="inputEmailAddress" placeholder="Correo electrónico" name="usuario">
        </div>
        <div class="separador">
        <i class="fa-solid fa-key icon"></i>
        <input type="password" id="inputPassword" placeholder="Contraseña" name="password">
        </div>
        <div class="separador">




        </div>
        <input class="boton" type="submit" value="Iniciar">
        <p>Al continuar, aceptas las<b> Condiciones de uso</b> y <b>Politica de privacidad</b>.</p>
        <br>
        <p>¿No tiene ninguna cuenta? <a href="registrarUsuario.php">Crear una</a></p>
        <br>
     <a href="index.php">Regresar al inicio</a></p>
    </div>
    </form>
</body>
</html>