<?php 
include "db.php";

if(isset($_POST['submit'])){
    $name_user=$_POST['name_user'];
    $surnames_user=$_POST['surnames_user'];
    $phone_user=$_POST['phone_user'];
    $email_user=$_POST['email_user'];
    $password_user=$_POST['password_user'];

    $sql= "INSERT INTO users (name_user, surnames_user, phone_user, state_user, email_user, password_user, fk_id_type_user)
    values('$name_user', '$surnames_user','$phone_user', 'Activo','$email_user', '$password_user', 2);";
    $result=mysqli_query($conexion, $sql);
    if($result){
        //echo "Información insertada correctamente";
        header('Location: indexLogin.php');
      }else{
        die (mysqli_error($conexion));
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0dd36181c0.js" crossorigin="anonymous"></script>
    <title>Registro de Usuario Nuevo - Kento</title>
    <link rel="stylesheet" href="estiloLogin.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class = "container">
    <div class="Content tablas my-5">
        <form method="POST">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Ingresa tu nombre" name="name_user" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" class="form-control" placeholder="Ingresa tus apellidos" name="surnames_user" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Numero de teléfono</label>
                <input type="text" class="form-control" placeholder="Ingresa tu número de teléfono" name="phone_user" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Correo Electrónico</label>
                <input type="text" class="form-control" placeholder="Ingresa tu correo electrónico" name="email_user"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="text" class="form-control" placeholder="Ingresa tu contraseña" name="password_user"
                    autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Confirmar</button>
            <button type="reset" class="btn btn-primary" name="limpiar">Limpiar</button>
            <a href="indexLogin.php">
                    <span class="btn btn-primary">Cancelar</span>
                </a>
        </form>
    </div>

    </div>
    <div id="toggle"></div>
</body>
</html>