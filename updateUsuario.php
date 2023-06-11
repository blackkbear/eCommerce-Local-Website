<?php
include "db.php";
$id_user=$_GET['updateid_user'];
$sql="SELECT * from users WHERE id_user=$id_user";
$result=mysqli_query($conexion, $sql);
$row=mysqli_fetch_assoc($result);
$name_user=$row['name_user'];
$surnames_user=$row['surnames_user'];
$phone_user=$row['phone_user'];
$state_user=$row['state_user'];
$email_user=$row['email_user'];
$password_user=$row['password_user'];
$fk_id_type_user=$row['fk_id_type_user'];

if(isset($_POST['submit'])){
    $name_user=$_POST['name_user'];
    $surnames_user=$_POST['surnames_user'];
    $phone_user=$_POST['phone_user'];
    $state_user=$_POST['state_user'];
    $email_user=$_POST['email_user'];
    $password_user=$_POST['password_user'];
    $fk_id_type_user=$_POST['fk_id_type_user'];

    $sql= "UPDATE users SET id_user='$id_user', name_user='$name_user', surnames_user='$surnames_user', phone_user='$phone_user', state_user='$state_user', email_user='$email_user', password_user='$password_user', fk_id_type_user='$fk_id_type_user' WHERE id_user=$id_user";
    $result=mysqli_query($conexion, $sql);
    if($result){
        //echo "Información actulizada correctamente";
        header('location:displayUsuario.php');
      }else{
        die (mysqli_error($conexion));
      }
    }
?>

<?php 
include "db.php";

session_start();
/* Si no hay usuario, nos mandara al login, no pueden llegar al admin sin el login. */
if(!isset($_SESSION["usuario"])){
    ?>
    <h1>sa</h1>
    <?php

    header("Location: indexLogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario - Kento</title>

    <link rel="stylesheet" href="estiloPedidosYUsuarios.css">
    <!-- el sig stylesheet es para importar iconos--> 
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>

<body>

<div class="nav-main">

<!-- <div class="search">
    <li>
        <i class='bx bx-search-alt'></i>
        <input type="text" placeholder="Buscar...">
        
    </li>
    </div> -->


<div class= "botonCerrar">
<li>
        <a href="logout.php">
            <span class="cerrar_sesion">Cerrar sesión</span>
        </a>
        
    </li>
    </div>
    



    <div class= "usuarioIniciadoAdmin">
<li>
<?php echo "Bienvenido " .$_SESSION["usuario"] ?>
    </li>

    

    </div>


<div class='corte'></div>
    </nav>

    <div class="sidebarLogo">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxs-component'></i>
                <div class="logo_name">Kento</div>

            </div>

            <div id="toggle"></div>

        </div>
        <ul class="nav_list">
            <li>
                <a href="indexAdmin.php">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Inicio</span>
                </a>
                 <!-- <span class="tooltip">Inicio</span>  -->
            </li>
            <li>
                <a href="displayOrder.php">
                    <i class='bx bx-cart'></i>
                    <span class="links_name">Pedidos</span>
                </a>
                 <span class="tooltip">Pedidos</span> 
            </li>

            <li>
                <a href="CRUD-Productos.php">
                    <i class='bx bx-purchase-tag-alt'></i>
                    <span class="links_name">Productos</span>
                </a>
                 <span class="tooltip">Productos</span> 
            </li>

            <li>
                <a href="displayUsuario.php">
                    <i class='bx bx-briefcase-alt'></i>
                    <span class="links_name">Usuarios</span>
                </a>
                 <span class="tooltip">Usuarios</span> 
            </li>

            <li>
                <a href="ayudaAdmin.php">
                    <i class='bx bx-help-circle'></i>
                    <span class="links_name">Ayuda</span>
                </a>
                 <span class="tooltip">Ayuda</span> 
            </li>
        </ul>
    </div>
    <div class = "home_content">

    <div class="Content tablas my-5">
        <form method="POST">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" placeholder="Ingresa tu nombre:" name="name_user" autocomplete="off" value=<?php echo $name_user; ?>>
            </div>
            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" class="form-control" placeholder="Ingresa tus apellidos:" name="surnames_user" autocomplete="off" value=<?php echo $surnames_user; ?>>
            </div>
            <div class="form-group">
                <label>Numero de teléfono</label>
                <input type="text" class="form-control" placeholder="Ingresa tu número de teléfono:" name="phone_user" autocomplete="off" value=<?php echo $phone_user; ?>>
            </div>
            <div class="form-group">
                <label>Estado del Usuario (Activo / Inactivo)</label>
                <input type="text" class="form-control" placeholder="Ingresa el estado del usuario:" name="state_user" autocomplete="off" value=<?php echo $state_user; ?>>
            </div>
            <div class="form-group">
                <label>Correo Electrónico</label>
                <input type="text" class="form-control" placeholder="Ingresa tu correo electrónico:" name="email_user" autocomplete="off" value=<?php echo $email_user; ?>>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="text" class="form-control" placeholder="Ingresa tu contraseña:" name="password_user" autocomplete="off" value=<?php echo $password_user; ?>>
            </div>
            <div class="form-group">
                <label>Tipo de Usuario (1/2)</label>
                <input type="text" class="form-control" placeholder="Ingrese el tipo de Usuario:" name="fk_id_type_user" autocomplete="off" value=<?php echo $fk_id_type_user; ?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Confirmar</button>
        </form>
    </div>

    </div>
    <div id="toggle"></div>

</body>

<!-- codigo de responsive sidebar -->
<script>
let toggle = document.querySelector("#toggle");
let sidebarLogo = document.querySelector(".sidebarLogo");

/* sig. codigo es para que al seleccionar cualquier sitio, se pueda quitar el sidebar */
document.onclick = function(e){
        if(e.target.id !== 'sidebarLogo' && e.target.id !== 'toggle')
        {
            toggle.classList.remove('active');
        sidebarLogo.classList.remove('active');
        }
    }

   /*  para habilitar y deshabilitar el abrir sidebar */
toggle.onclick = function(){
    toggle.classList.toggle('active');
    sidebarLogo.classList.toggle('active');
  }

</script>



</html>